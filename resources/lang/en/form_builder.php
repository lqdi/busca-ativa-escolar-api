<?php
return [

	'pesquisa' => [
		'group' => [
			'personal' => 'Dados da criança ou adolescente',
			'school' => 'Educação',
			'work' => 'Trabalho',
			'guardians' => 'Sobre os pais ou responsáveis',
			'cause' => 'Sobre o motivo de exclusão escolar',
			'place' => 'Dados de localização',
		],
		'field' => [
			'name' => "Nome da criança ou adolescente*",
			'gender' => "Sexo*",
			'race' => "Raça / Etnia*",
			'dob' => "Data de nascimento*",
			'rg' => "RG",
			'cpf' => "CPF",
			'has_been_in_school' => "Já frequentou a escola alguma vez?*",
			'reason_not_enrolled' => "Qual a justificativa de não ter frequentado?*",
			'school_last_grade' => "Qual o último ano que frequentou?*",
			'school_last_year' => "Em qual ano foi cursado o último ano escolar?*",
			'school_last_status' => "Qual o status do último ano escolar?*",
			'school_last_age' => "Com qual idade foi cursado o último ano escolar?*",
			'school_last' => "Qual a última escola cursada?*",
			'school_last_id' => 'Qual a última escola cursada?*',
			'school_last_name' => 'Qual a última escola cursada?*',
			'school_last_address' => "Endereço da última escola cursada*",
			'is_working' => "Esta criança ou adolescente está trabalhando?*",
			'work_activity' => "Qual a atividade econômica?*",
			'work_activity_other' => "Especifique a atividade econômica no campo abaixo*",
			'work_is_paid' => "O trabalho é remunerado?*",
			'work_weekly_hours' => "Quais as horas semanais trabalhadas?*",
			'parents_has_father' => 'A criança tem o pai presente?*',
			'parents_has_mother' => "A criança tem a mãe presente?*",
			'parents_has_brother' => 'A criança tem irmãos/irmãs presentes?*',
            'parents_has_grandparents' => 'A criança tem avós presentes?*',
            'parents_has_others' => 'A criança tem outros parentes presentes?*',
			'parents_who_is_guardian' => "Quem é o responsável?*",
			'mother_name' => "Nome completo da mãe*",
			'guardian_name' => "Nome completo do responsável*",
			'guardian_rg' => "RG do responsável",
			'guardian_cpf' => "CPF do responsável",
			'guardian_dob' => "Data de nascimento do responsável",
			'guardian_phone' => "Contato do responsável",
			'guardian_race' => "Raça ou etnia do responsável",
			'guardian_schooling' => "Escolaridade do responsável",
			'guardian_job' => "Ocupação do responsável",
			'parents_income' => "Renda familiar per capita",
			'case_cause_ids' => 'Motivos de estar fora da escola*',
			'handicapped_at_sus' => "A criança ou adolescente é atendida pelo SUS (Sistema Único de Saúde)?*",
			'handicapped_reason_not_enrolled' => "Por qual motivo a matrícula não foi realizada?*",
			'place_address' => "Endereço*",
			'place_cep' => "CEP",
			'place_reference' => "Referência geográfica",
			'place_neighborhood' => "Bairro*",
			'place_kind' => "Tipo da localização*",
			'place_is_quilombola' => "Comunidade quilombola*",
			'place_uf' => 'UF*',
			'place_city_id' => 'Município / UF*',
			'place_city_name' => 'Município / UF*',
		],
	],

	'alerta' => [
		'group' => [
			'personal' => 'Dados da criança ou adolescente',
			'cause' => 'Sobre o motivo de exclusão escolar',
			'parents' => 'Sobre os pais ou responsáveis',
			'place' => 'Dados de localização',
            'observation' => 'Observações (caso necessário)'
		],

		'field' => [
			'name' => "Nome da criança ou adolescente*",
			'gender' => "Sexo",
			'race' => "Raça / Etnia",
			'dob' => "Data de nascimento",
			'rg' => "RG",
			'cpf' => "CPF",
			'nis' => "NIS (Número de Identificação Social)",
			'cns' => "CNS (Cartão Nacional do SUS)",

			'mother_name' => "Nome completo da mãe ou responsável*",
			'mother_rg' => "RG da mãe ou responsável",
			'mother_phone' => "Telefone da mãe ou responsável",

			'father_name' => "Nome completo do pai ou responsável",
			'father_rg' => "RG do pai ou responsável",
			'father_phone' => "Telefone do pai ou responsável",

			'alert_cause_id' => 'Por que a criança ou adolescente está fora da escola?*',

			'place_address' => "Endereço*",
			'place_cep' => "CEP",
			'place_reference' => "Referência geográfica",
			'place_neighborhood' => "Bairro*",
			'place_uf' => 'UF*',
			'place_city_id' => 'Município*',
			'place_city_name' => 'Município*',

			//'place_phone' => 'Telefone',
			//'place_mobile' => 'Celular',

            'observation' => 'Anotações ou registros'
		]
	],

];