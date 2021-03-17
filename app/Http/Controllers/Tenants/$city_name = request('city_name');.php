$city_name = request('city_name');
$city_uf = request('city_uf');
$status = request('status');
$created_at = request('created_at');


$query = TenantSignup::query()
->with(['city', 'judge', 'tenant.operationalAdmin', 'tenant.politicalAdmin'])
->orderBy('created_at', 'ASC');

if (isset($city_name) && strlen($city_name) > 0) {
$query->whereHas('city', function ($sq) use ($city_name) {
return $sq->where('name_ascii', 'REGEXP', Str::ascii($city_name));
});
}

if (isset($city_uf) && strlen($city_uf) > 0) {
$query->whereHas('city', function ($sq) use ($city_uf) {
return $sq->where('uf', 'REGEXP', Str::ascii($city_uf));
});
}

switch ($status) {
case "all":
$query->withTrashed();
break;
case "rejected":
$query->withTrashed()->whereNotNull('deleted_at')->where('is_approved', 0);
break;
case "canceled":
$query->withTrashed()->whereNotNull('deleted_at')->where('is_approved', 1);
break;
case "pending_approval":
$query->where('is_approved', 0);
break;
case "pending_setup":
$query->where('is_approved', 1)->where('is_provisioned', 0);
break;
case "active":
$query->where('is_approved', 1)->where('is_provisioned', 1);
break;
case "pending":
default:
break;
}

if (isset($created_at) && strlen($created_at) > 0) {
$numDays = intval($created_at);
$cutoffDate = Carbon::now()->addDays(-$numDays);

$query->where('created_at', '>=', $cutoffDate->format('Y-m-d H:i:s'));
}

$signups = $query
->get()
->map(function ($signup) { /* @var $signup TenantSignup */
return $signup->toExportArray();
})
->toArray();
return $this->excel->download(new TenantSignupExport($signups), 'buscaativaescolar_adesoes.xls');