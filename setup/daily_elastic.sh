#!/bin/bash
filename='tenants.txt'
while read tenant ; do
    echo "${tenant}"
    es2csv -r -q '{"query":{"bool":{"must":[],"should":[],"filter":[{"bool":{"should":[{"terms":{"tenant_id":["${tenant}"]}}]}}]}}}' -i children_daily -u localhost:9200 -o elastic_children_daily_"${tenant}".csv
done < formatted_history.txt