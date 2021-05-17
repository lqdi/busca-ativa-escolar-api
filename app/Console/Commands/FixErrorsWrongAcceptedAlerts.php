<?php

namespace BuscaAtivaEscolar\Console\Commands;

use BuscaAtivaEscolar\Child;
use Illuminate\Console\Command;

class FixErrorsWrongAcceptedAlerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:alerts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retornar alertas para a etapa correta';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ids = [
            'b8352330-97a8-11eb-acc6-a17abcd31da4',
            'b8d95a20-97a8-11eb-989e-939a73fdb73d',
            'b8fdda80-97a8-11eb-b1dc-c732aaca7787',
            'b91d3d10-97a8-11eb-8894-49afd693280c',
            'b97b7d60-97a8-11eb-9b7e-390a10624559',
            'ba121cf0-97a8-11eb-ae28-87b1e988c966',
            '27694730-a137-11eb-974e-d7ef3091ffc3',
            'bc9953e0-4c03-11ea-b2a3-a92c35a02385',
            'c61b1880-4c03-11ea-90db-635c0faad740',
            '702b1520-9c66-11eb-8fe6-556bb273f0fe',
            '897e50b0-e8da-11ea-92a1-7b7c95863811',
            '8a8072b0-9621-11eb-8981-591493b737ac',
            '8d29d9c0-9621-11eb-b0d1-65a72278e50e',
            '1cedeb80-38d3-11eb-88e1-6fc5cc8784be',
            '3b857810-38d4-11eb-b6e3-9fdddbbc1f52',
            '4796e6c0-38d2-11eb-882c-31c18f29f380',
            '546fb250-38d1-11eb-8d7a-eb4c0dbb0da4',
            '5d4ebb40-38cf-11eb-ae3c-59d5cc02db82',
            '61542bb0-38cf-11eb-b62c-91240b2d704c',
            '661a89e0-38cf-11eb-9c88-d1ae1b91d03c',
            '66469c40-38cf-11eb-a122-7798b79bead8',
            '6660e110-38cf-11eb-9539-992d95c6cd91',
            '66794cb0-38cf-11eb-a77d-01a8b1f9a948',
            '66956800-38cf-11eb-a349-6348780355a5',
            '66aeafd0-38cf-11eb-ab43-b99f551601d8',
            '73363580-38cf-11eb-885c-9369b885e079',
            'dfd3ff70-38d2-11eb-9516-651f9ab88396',
            '1f07f780-8daf-11eb-bbfa-0dba1af539a8',
            'bfb214c0-a435-11eb-8cd9-dd59596c168f',
            'c0085c00-a435-11eb-aa86-3516a32d421a',
            'c0860e20-a435-11eb-ba4c-4555c038c81a',
            'ead9f320-a1e7-11eb-933d-2f56b761c5cd',
            'ebbe0aa0-a1e7-11eb-97a8-21a54a581e24',
            'ee293650-a1e7-11eb-b775-c39ae8ce72d6',
            '907c74c0-a68c-11eb-ace4-0f1d2ebbd9e9',
            'f2a823d0-5eec-11ea-9e24-b775bad7db3b',
            '1b411020-9863-11eb-8eb9-8b73ff5d21cd',
            '1bbe70a0-9863-11eb-8c20-4b7f5fef6825',
            '1cef5320-9863-11eb-9d4d-856ee499228e',
            '1d200fa0-9863-11eb-9da4-4bbfe4234a5f',
            '1d600350-9863-11eb-9a04-31d643c86e7e',
            '1d7e2710-9863-11eb-b166-9f3a4a0aeee6',
            '1e06e180-9863-11eb-bdb5-b9ec71db5152',
            '1ec59100-9863-11eb-8597-6fab547132bb',
            '1f718800-9863-11eb-bd41-f11202ea0544',
            '29ff6ba0-9863-11eb-aeaa-e3db5b3c97a6',
            '2a6dab50-9863-11eb-b253-6509a7de0aa6',
            '2b0c1920-9863-11eb-842d-8bf2de3dd803',
            '2cd5f260-9863-11eb-8d44-8b92ea1ffa04',
            '2f8b8520-9863-11eb-9e78-41f813ecf61b',
            '9687d8f0-989b-11eb-8f6c-33d6caef3c33',
            '96e2e040-989b-11eb-9234-c58e1c2373a9',
            'a25a61a0-989b-11eb-8896-cf1859123d65',
            'a29034c0-989b-11eb-b467-e916566e870c',
            'a3429770-989b-11eb-8e0c-350db276d75d',
            'fab03cb0-a68d-11eb-b6c8-47e3c2dcd6b1',
            'fccb8100-a68d-11eb-9b4f-85b55557c622',
            'b4d66da0-620b-11ea-a592-639aa08956d5',
            '195c5eb0-9676-11eb-9688-4912d0e7b5ad',
            '6239e4a0-960a-11eb-9e7c-2181d436ec86',
            '1346f960-a43b-11eb-adba-6b385f0cbcb5',
            '70af9d70-a440-11eb-89d4-2f9215e81894',
            '8810c600-a43a-11eb-8eee-413cd2082f4e',
            '95dad590-a43e-11eb-9368-9db45a0b9968',
            '9724a620-a43d-11eb-992a-8d3ca679bbf6',
            'cd735390-a43c-11eb-9e53-93c38db981c1',
            'e3f8f730-a435-11eb-af8b-839b6e008e67',
            'b7aee6c0-90d4-11eb-a2cc-570aee91880d',
            '03d030a0-8e2c-11e9-9096-5372cf0b05e4',
            '2a5d6360-a202-11eb-91f9-8d1dc2dc68c8',
            '0b574fa0-a690-11eb-973d-539ff24d2f0f',
            '21e732c0-a68b-11eb-9f81-d5edb39a4fad',
            '43c7de30-a68e-11eb-8620-93cb590a7197',
            '6dafc240-a68f-11eb-8411-f35edfc020e4',
            '816302e0-a68e-11eb-a015-cd0a6e7f8f8e',
            'b786dd30-a68d-11eb-b62d-3b0f020ebfb5',
            'c08e7df0-a68c-11eb-a45e-d7104a6db38b',
            'dacd1680-a688-11eb-93c6-ad52ba33c3bb',
            '1b2e6380-9644-11eb-8fc0-d18aab564bbd',
            '1c8bb8b0-9644-11eb-97ef-a5ae5576900a',
            '1d597420-9644-11eb-95b6-1bd04769605c',
            '6d4147a0-a1e6-11eb-aeb3-ebe070c755f9',
            'e945fed0-a1e2-11eb-ab45-250bc3e1bdb5',
            'eac8e6f0-a1e4-11eb-ab31-45e872fbbfd8',
            '1288f100-67bb-11eb-9024-652355e5cd3b',
            '228add60-9f57-11ea-b4fe-c14387153930',
            '24007320-9f57-11ea-ab41-db6a4cb5c8b8',
            '263c5b80-9f57-11ea-9924-b9e895f78057',
            '26a9c380-9f57-11ea-a0c6-194ac51fc3a8',
            '26d09520-9f57-11ea-8ff8-37ee72859e0e',
            '26eee750-9f57-11ea-b02b-19260709f613',
            '2713b560-9f57-11ea-b9aa-d781bf7b1983',
            '2834a3f0-9f57-11ea-9a94-b5413db049d0',
            '28510a40-9f57-11ea-9708-3b51438aba4b',
            '41cf4a00-9f58-11ea-b526-3fa5ececce63',
            '43f92d80-9f58-11ea-9527-81dbf90b6d75',
            '46e5a5d0-9f58-11ea-9aca-d95eb2c5afc5',
            '479745c0-9f58-11ea-ac33-4f55b19fcd8a',
            '488d2f00-9f58-11ea-a38a-8d6b2fc1afea',
            '48c56e50-9f58-11ea-8924-49e0d6d63650',
            '48e169f0-9f58-11ea-b575-6dd5420e3d09',
            '48fdc830-9f58-11ea-b8ae-05327e5e17e3',
            '491dfa00-9f58-11ea-b331-29edc22172cd',
            '493ad9f0-9f58-11ea-95e8-cfbf86f1a232',
            '4953d1c0-9f58-11ea-946b-3dbda3e634ae',
            '496eb7b0-9f58-11ea-b17a-fb510cfa13af',
            '49900050-9f58-11ea-8329-373a703e96ac',
            '49ade3b0-9f58-11ea-9bb4-075123d9880f',
            '603182c0-9651-11eb-8e8a-7776586cf59d',
            '6369adc0-9651-11eb-9a73-db4aacc9ba90',
            '63e006a0-9651-11eb-b42d-2df809045d23',
            '6433fe90-9651-11eb-9f06-636ad6ebeaf3',
            '650b2fd0-9651-11eb-9274-378f5f333a6b',
            'fb4571a0-9f56-11ea-878a-e352f9b2dd2c',
            'd1bb6950-9644-11eb-9823-c35dd8c1a91d',
            'd5587e70-9644-11eb-9851-7b03b635a140',
            'dc333770-9644-11eb-81e4-fb8871a569a8',
            'e6741c20-a42e-11eb-b7f7-83c7c9125b83',
            'ec29ca60-a42e-11eb-9e27-b7f0bdea79c5',
            '25469660-80ce-11eb-90dc-f9ff8cf972d6',
            '42646610-80ce-11eb-a7a6-714c8dfab903',
            '432269c0-80ce-11eb-a057-4d3d37831934',
            '3deb1450-976e-11e9-b23d-c3b08e07c7bc',
            '3f8f7120-976e-11e9-9496-6552828b4b6a',
            '466999a0-976e-11e9-a077-4b8775ede53e',
            '65261ff0-5d59-11ea-a8d7-f5915e1f1036',
            'acd42e40-67ab-11eb-8575-d78c243fe2f8',
            '30ad8f90-a68d-11eb-888d-1fe7157751da',
            '4710f480-a688-11eb-ba77-bf70fb69379e',
            '48d5fe30-a51c-11eb-b3e1-fba8f8917467',
            '494238c0-a51c-11eb-9711-c19f3eee3ccf',
            '4a218560-a51c-11eb-97f2-594402069481',
            '4a96f5b0-a51c-11eb-9ecb-4532b346b6b7',
            '4aaa6070-a51c-11eb-b06a-f55617bf2eb1',
            '4d6246b0-a51c-11eb-b81a-e79f320a6d62',
            '4d8a2720-a51c-11eb-a0f6-115b02b2836e',
            '4d9e6510-a51c-11eb-9322-5b7bc529f7ee',
            '4e365880-a51c-11eb-b52d-abf470e6ff1c',
            '4e7da200-a51c-11eb-8c62-ef0092868b9c',
            '4e90bce0-a51c-11eb-96b7-172f5f1a4d52',
            '4eba1500-a51c-11eb-869f-756ad11363b4',
            '4ee152e0-a51c-11eb-802c-0f9d91f716ae',
            '5683a8f0-a51c-11eb-a638-d9af217434b1',
            '7b5457c0-a374-11eb-a925-9b437f0e6622',
            '996be8a0-a379-11eb-b99c-1fe8679dd907',
            '041f04d0-aa4c-11ea-b40c-cf154f8c2516',
            '5c4709d0-a4fe-11ea-8beb-d916f405010e',
            '5dfcd430-a4ff-11ea-936c-ef572c339d96',
            '9db7dcb0-a4ff-11ea-ad48-016710e12345',
            '9f9761d0-a4ff-11ea-91fc-9fbca597b31d',
            '9fc76140-a4ff-11ea-b3e8-db286cdbf361',
            'ab282ef0-a4ff-11ea-bcd0-a74783abb821',
            'ad2e8330-a4ff-11ea-9168-2b6b8aacc148',
            'ad3cea90-a4ff-11ea-b2d9-05ab103eb2fe',
            'ad69ca80-a4ff-11ea-8662-c3fe6c4df4bb',
            'ad921700-a4ff-11ea-be70-259e15469efb',
            'b1684400-aa4b-11ea-81e0-f5825bb1897a',
            'b39613a0-aa4b-11ea-86d7-f9d139426d11',
            'b6109c20-aa4b-11ea-a876-7d8c382fd47f',
            'f2401680-aa4b-11ea-bd14-cd0061729f18',
            'f4e3c8d0-aa4b-11ea-8805-89bffb6697a4',
            'f60637a0-aa4b-11ea-b997-150cfd9584eb',
            'f78b9e10-aa4b-11ea-a69f-658d24c98fa6',
            'f86972c0-aa4b-11ea-a472-59623439ede9',
            'f9c8fe10-aa4b-11ea-bb16-cd6a69d7cc8e',
            '535ab7f0-a689-11eb-9a62-73fca06e6188',
            '9df954a0-a463-11eb-b67a-97dc3fff10cc',
            '0847e6e0-90c1-11eb-a921-a9d102a3dff2',
            '08610ff0-90c1-11eb-8b63-abfb4364d4a7',
            '098cb340-90c1-11eb-85b2-c112b1ff2a3d',
            'aef1da20-90c1-11eb-b3fc-1bc575082205',
            'af0881f0-90c1-11eb-a0a6-192b6c262cef',
            'b062e8d0-90c1-11eb-96c7-17524d435c2c',
            'b2142030-90c1-11eb-81df-05c356849c97',
            'b4b49a50-90c1-11eb-a46a-152de415842a',
            'b54cc2f0-90c1-11eb-b60e-2943bee60d78',
            'b5accaa0-90c1-11eb-b1a7-c3b878dafc1a',
            'b791c660-90c1-11eb-a9e6-6317af359c91',
            'bbc9e860-90c1-11eb-aae3-01f59487fddf',
            'bc0c3df0-90c1-11eb-85bd-a34509844203',
            'bc220840-90c1-11eb-8dd5-a9c92e75d2bc',
            'bc69cf00-90c1-11eb-b7c8-41e35e56ea14',
            'bc82da00-90c1-11eb-bc8e-ad210049ce7a',
            'bcc845b0-90c1-11eb-ba5d-179f29eef9d4',
            'bcdbd3d0-90c1-11eb-92ac-6d7a2b41114c',
            'bcf9eeb0-90c1-11eb-aee0-53620d527181',
            'bd324b60-90c1-11eb-aef7-e3dd21be9d0f',
            'bd881890-90c1-11eb-8990-f125ff9695ba',
            'bdd51020-90c1-11eb-b721-cdc69c893dd8',
            'be094c40-90c1-11eb-9ad8-8328e7290a94',
            'bf14aac0-90c1-11eb-a99e-b10c0babf226',
            'bf408200-90c1-11eb-9497-5127ac9f5104',
            'bf67d130-90c1-11eb-8428-8bd9826e8b38',
            'bf7b81d0-90c1-11eb-adbc-d1e9dcef9d08',
            'c0033df0-90c1-11eb-950e-6b08d3fa4eaa',
            'c05d10f0-90c1-11eb-a6ec-5fdb849fe216',
            'c07474e0-90c1-11eb-9808-a72efdbab54f',
            '6d9f3700-c834-11ea-a032-8fb8da3a06f0',
            'e69a99b0-a435-11eb-bef4-6d184f235d1b',
            'c1f9dbf0-fd48-11ea-b336-759a6cc4ca14',
        ];

        foreach ($ids as $id){
            $child = Child::where('id', '=', $id)->get()->first();
            if($child != null){
                $child->alert_status = 'pending';
            }
        }

        $this->comment("Finalizado");
    }
}
