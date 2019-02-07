ApÓS A instalação do elastic e do plugin kopf fazer as seguintes configurações:
Entre no endereço http://localhost:19200/_plugin/kopf/#!/cluster
Acesse o menu superior REST;

Na url do bloco REQUEST insira 'children' escolha no select a opção 'PUT' e cole o conteúdo do documento
es_index_settings_children.json dentro do text área que tem o conteúdo '{}', depois clique no botão 'send' você recebera a respota 
{"acknowledged": true}

Na url do bloco REQUEST insira 'children_daily' escolha no select a opção 'PUT' e cole o conteúdo do documento
es_index_settings_children_daily.json dentro do text área que tem o conteúdo '{}', depois clique no botão 'send' você recebera a respota
{"acknowledged": true}

Na url do bloco REQUEST insira 'cities' escolha no select a opção 'PUT' e cole o conteúdo do documento
es_index_settings_cities.json dentro do text área que tem o conteúdo '{}', depois clique no botão 'send' você recebera a respota 
{"acknowledged": true}

Na url do bloco REQUEST insira 'schools' escolha no select a opção 'PUT' e cole o conteúdo do documento
es_index_settings_schools.json dentro do text área que tem o conteúdo '{}', depois clique no botão 'send' você recebera a respota 
{"acknowledged": true}

Pronto a configuração está feita você pode visualizar essa informações no menu 'cluster' escolhendo algum indice como por exemplo o 'children' clicando
na seta para baixo ao lado do nome e escolhendo a opção 'show settings'.

Agora é preciso fazer o mappeamento do indice, para isso entre no menu REST e faça o procedimento a seguir:

Na url do bloco REQUEST insira 'children/child/_mapping' e escolha no select a opção 'PUT' e cole o conteúdo do documento
es_index_mapping_children.json centro do text área que tem o conteúdo '{}', depois clique no botão 'send' você recebera a respota 
{"acknowledged": true}

Na url do bloco REQUEST insira 'children/children_daily/_mapping' e escolha no select a opção 'PUT' e cole o conteúdo do documento
es_index_mapping_children_daily.json centro do text área que tem o conteúdo '{}', depois clique no botão 'send' você recebera a respota 
{"acknowledged": true}

Na url do bloco REQUEST insira 'children/cities/_mapping' e escolha no select a opção 'PUT' e cole o conteúdo do documento
es_index_mapping_cities.json centro do text área que tem o conteúdo '{}', depois clique no botão 'send' você recebera a respota 
{"acknowledged": true}

Na url do bloco REQUEST insira 'children/schools/_mapping' e escolha no select a opção 'PUT' e cole o conteúdo do documento
es_index_mapping_schools.json centro do text área que tem o conteúdo '{}', depois clique no botão 'send' você recebera a respota 
{"acknowledged": true}
