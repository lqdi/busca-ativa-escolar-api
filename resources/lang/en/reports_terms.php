<?php
return [

    'gender' => [
        'male' => 'Masculino',
        'female' => 'Feminino',
        'null' => 'Não disponível',
    ],

    'status' => [
        "out_of_school" => 'Fora da escola',
        "in_observation" => 'Em observação',
        "in_school" => 'Dentro da escola',
        "cancelled" => 'Cancelado',
    ],

    'name_by_slug' => [
        'alerta' => 'Alerta',
        'pesquisa' => 'Pesquisa',
        'analise_tecnica' => 'Análise Técnica',
        'gestao_do_caso' => 'Gestão do Caso',
        'rematricula' => '(Re)matrícula',
        '1a_observacao' => "1ª Observação",
        '2a_observacao' => "2ª Observação",
        '3a_observacao' => "3ª Observação",
        '4a_observacao' => "4ª Observação",
    ],

    'age_ranges' => [
        '0.0-3.0' => 'de 0 a 3 anos',
        '4.0-5.0' => 'de 4 a 5 anos',
        '6.0-10.0' => 'de 6 a 10 anos',
        '11.0-14.0' => 'de 11 a 14 anos',
        '15.0-17.0' => 'de 15 a 17 anos',
        '18.0-5000.0' => 'mais de 18 anos',
        'null' => 'Não informado',
    ],

    'parents_income' => [
        'up_to_quarter' => 'Até ¼',
        'between_quarter_and_half' => 'Mais de ¼ a ½',
        'between_one_and_two' => 'Mais de 1 a 2',
        'over_2' => 'Mais de 2',
        'null' => 'Não informado',
    ],

    'alert_status' => [
        "pending" => 'Pendente',
        "accepted" => 'Procedente',
        "rejected" => 'Improcendente',
    ],

    'deadline_status' => [
        'normal' => 'OK',
        'late' => 'Em atraso',
    ],

    'gender_icon' => [
        'male' => 'fa-mars',
        'female' => 'fa-venus',
        'undefined' => 'fa-transgender',
        'null' => 'fa-transgender-alt',
    ],

    'race' => [
        'indigena' => "Indígena",
        'branca' => "Branca",
        'preta' => "Preta (pretos e pardos)",
        'amarela' => "Amarela",
        'null' => "Não disponível",
    ],

    'risk_level' => [
        'high' => 'Alto',
        'medium' => 'Médio',
        'low' => 'Baixo',
    ],

    'place_kind' => [
        'urban' => 'Urbano',
        'rural' => 'Rural',
        'null' => "Não disponível",
    ],

    'work_activity' => [
        'servico_domestico' => 'Serviço doméstico',
        'negocio_familiar' => 'Negócio familiar',
        'other', 'label' => 'Outra atividade',
        'null' => 'Não informado'
    ],

    'guardian_schooling' => [
        'nenhuma' => 'Nenhuma',
        'ef_incompleto' => 'Ensino fundamental incompleto',
        'ef_completo' => 'Ensino fundamental completo',
        'em_incompleto' => 'Ensino médio incompleto',
        'em_completo' => 'Ensino médio completo',
        'superior_incompleto' => 'Ensino superior incompleto',
        'superior_completo' => 'Ensino superior completo',
        'posgraduacao' => 'Pós graduação',
        'null' => 'Não informado'
    ],

    'case_causes' =>
    [
        'adolescente_em_conflito_com_a_lei' => 'Adolescente em conflito com a lei',
        'crianca_com_deficiencia_fisica' => 'Criança ou adolescente com deficiência física',
        'crianca_com_deficiencia_intelectual' => 'Criança ou adolescente com deficiência intelectual',
        'crianca_com_deficiencia_mental' => 'Criança ou adolescente com deficiência mental',
        'crianca_com_deficiencia_sensorial' => 'Criança ou adolescente com deficiência sensorial',
        'crianca_com_deficiencia_impeditiva' => 'Criança ou adolescente com deficiência(s) que impeça(m) ou dificulte(m) a frequência à escola',
        'crianca_com_doencas' => 'Criança ou adolescente com doenças (que impedem e/ou dificultem a frequência à escola',
        'crianca_em_abrigo' => 'Criança ou adolescente em abrigo',
        'crianca_na_rua' => 'Criança ou adolescente em situação de rua',
        'crianca_vitima_abuso' => 'Criança ou adolescente que sofrem ou sofreram abuso / violência sexual',
        'crianca_adolescente_estrangeiro' => 'Crianças ou adolescentes migrantes estrangeiro',
        'evasao_desinteresse' => 'Evasão porque sente a escola desinteressante',
        'evasao_desinteresse_escola' => 'Evasão porque sente a escola desinteressante (Desinteresse pela escola)',
        'evasao_desinteresse_estudo' => 'Evasão porque sente a escola desinteressante (Desinteresse pelos estudos)',
        'falta_documentacao' => 'Falta de documentação da criança ou adolescente',
        'falta_infraestrutura_escola' => 'Falta de infraestrutura escolar (Escola)',
        'falta_infraestrutura_vagas' => 'Falta de infraestrutura escolar (Vagas)',
        'falta_transporte' => 'Falta de transporte escolar',
        'falta_transporte_escolar' => 'Falta de transporte escolar (Transporte escolar público)',
        'falta_transporte_publico' => 'Falta de transporte escolar (Transporte público - ônibus, metrô, trem, balsa, barco etc.)',
        'falta_transporte_particular' => 'Falta de transporte escolar (Transporte particular - veículo próprio)',
        'gravidez_adolescencia' => 'Gravidez na adolescência',
        'preconceito_racial' => 'Preconceito ou discriminação racial',
        'trabalho_infantil' => 'Trabalho infantil',
        'uso_substancias' => 'Uso, abuso ou dependência de substâncias psicoativas',
        'violencia_familiar' => 'Violência familiar',
        'violencia_escolar_genero' => 'Violência na escola (Discriminação de gênero)',
        'violencia_escolar_raca' => 'Violência na escola (Discriminação racial)',
        'violencia_escolar_religiao' => 'Violência na escola (Discriminação religiosa)',
        'violencia_escolar_sexualidade' => 'Violência na escola (discriminação por orientação sexual)',
        'violencia_escolar_bullying' => 'Violência na escola (bullying)',
        'violencia_escolar_conf_estudantes' => 'Violência na escola (conflitos com outros estudantes)',
        'violencia_escolar_conf_colaboradores' => 'Violência na escola (conflitos da criança e/ou adolescente com funcionários, docentes ou gestores da escola)',
        'mudanca_endereco' => 'Mudança de domicílio, viagem ou deslocamentos frequentes',
        'violencia_territorio' => 'Violência no território',
        'educacenso_inep' => 'Evasão reportada pelo Educacenso/INEP',
        'xls_import' => 'Evasão e/ou infrequência reportada pela escola ou município',
        'null' => 'Não informado'
    ]

];