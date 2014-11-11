<?php echo $this->Html->css('autocomplete/autocomplete'); ?>
<style>
.table {
	border: solid 1px #6c3f30;
}

th {
	color: #FFF;
	background-color: #6c3f30;
	border: solid 1px #E8DED4;
}
</style>
<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>">Inicio</a></li>
  <li><a href="<?php echo $this->base; ?>/manuscripts">Música Manuscrita</a></li>
  <li>Agregar Obra </li>
</ul>

<div class="items">
<div class="col-md-12 column">
<h2>Agregar Partitura</h2>

<?php echo $this->Form->create('Manuscript', array('enctype' => 'multipart/form-data')); ?>

<h5>Datos de Cabecera o Líder</h5>

<!--
<div style="text-align: center;">
	<select id="tipo" class="form-control">
			<option value="0">Seleccione el tipo de registro</option>
		<optgroup label="MATERIAL TEXTUAL">
			<option value="1">Libro</option>
			<option value="2">Revista</option>
			<option value="3">Parte de Libro</option>
			<option value="4">Parte de Revista</option>
		</optgroup>
		<optgroup label="MÚSICA ESCRITA">
			<option value="5">Música Impresa</option>
			<option value="6">Música Manuscrita</option>
			<option value="7">Música Impresa (parte componente)</option>
			<option value="8">Música Manuscrita (parte componente)</option>
			<option value="9">Música Impresa (parte de revista)</option>
			<option value="10">Música Impresa (colección)</option>
			<option value="11">Música Manuscrita (colección facticia)</option>
		</optgroup>
		<optgroup label="MATERIAL GRÁFICO">
			<option value="12">Imágenes fijas bidimensionales</option>
			<option value="13">Imágenes fijas bidimensionales (parte de libro)</option>
			<option value="14">Imágenes fijas bidimensionales (parte de revista)</option>
		</optgroup>
	</select>
</div>

<br />
-->

<table class="table">
	<tr>
		<th><label>Estado del Registro.</label></th>
		<td>
		<?php
			echo $this->Form->input('h-005', array('label' => false, 'class' => 'form-control',
				'options' => array(
					'a' => 'a - Aumentado el nivel de codificación.', 
					'c' => 'c - Corregido o revisado.',
					'd' => 'd - Suprimido.',
					'n' => 'n - Nuevo.',
					'p' => 'p - Aumentado el nivel de codificación utilizado antes de la publicación.'
					),
				'selected' => 'n',
				'empty' => 'Seleccione'
			));?>
		</td>
	</tr>
	<tr>
		<th><label>Tipo de Registro.</label></th>
		<td>
		<?php
		echo $this->Form->input('h-006', array('label' => false, 'class' => 'form-control',
			'options' => array(
				/*'a' => 'a - Material textual.',
				'c' => 'c - Música notada impresa.',*/
				'd' => 'd - Música notada manuscrita.',
				/*'e' => 'e - Material cartográfico.',
				'f' => 'f - Material cartográfico manuscrito.',
				'g' => 'g - Material gráfico proyectable.',
				'i' => 'i - Grabación sonora no musical.',
				'j' => 'j - Grabación sonora musical.',
				'k' => 'k - Material gráfico bidimensional, no proyectable.',
				'm' => 'm - Archivo de ordenador.',
				'o' => 'o - Kit.',
				'p' => 'p - Material mixto.',
				'r' => 'r - Objeto tridimensional artificial o natural.',
				't' => 't - Material textual manuscrito.'*/
				),
			'selected' => 'd'/*,
			'empty' => 'Seleccione'*/
		)); ?>
		</td>
	</tr>
	<tr>
		<th><label>Nivel Bibliográfico.</label></th>
		<td>
		<?php
		echo $this->Form->input('h-007', array('label' => false, 'class' => 'form-control',
			'options' => array(
				'a' => 'a - Parte componente monográfica.',
				/*'b' => 'b - Parte componente seriada.',*/
				'c' => 'c - Colección.',
				/*'d' => 'd - Subunidad.',
				'i' => 'i - Recurso integrable.',*/
				'm' => 'm - Monografía.',
				/*'s' => 's - Publicación seriada.'*/
			),
			'selected' => 'm'/*,
			'empty' => 'Seleccione'*/
		));?>
		</td>
	</tr>
	<tr>
		<th><label>Nivel de Codificación.</label></th>
		<td>
		<?php
		echo $this->Form->input('h-017', array('label' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - Nivel completo.',
				'1' => '1 - Nivel completo, material no examinado.',
				'2' => '2 - Nivel incompleto, material no examinado.',
				'3' => '3 - Nivel abreviado.',
				'4' => '4 - Nivel básico.',
				'5' => '5 - Nivel parcial (preliminar).',
				'7' => '7 - Nivel mínimo.',
				'8' => '8 - Nivel de prepublicación.',
				'u' => 'u - Desconocido.',
				'z' => 'z - No aplicable.'
			),
			'selected' => '7',
			'empty' => 'Seleccione'
		));?>
		</td>
	</tr>
	<tr>
		<th><label>Forma de Catalogación Descriptiva.</label></th>
		<td>
		<?php
		echo $this->Form->input('h-018', array('label' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No es ISBD.',
				'a' => 'a - AACR 2.',
				'c' => 'c - ISBD sin puntuación.',
				'i' => 'i - ISBD con puntuación.',
				'u' => 'u - Desconocida.'
			),
			'selected' => 'a',
			'empty' => 'Seleccione'
		));
		?>
		</td>
	</tr>
</table>



<a name="top" href=""></a>

<ul class="nav nav-tabs">
	<li class="active"><a class="tab" name="all-tabs" href="" id="t0xx">0XX</a></li>
	<li><a class="tab" href="" id="t1xx">1XX</a></li>
	<li><a class="tab" href="" id="t2xx">2XX</a></li>
	<li><a class="tab" href="" id="t3xx">3XX</a></li>
	<li><a class="tab" href="" id="t4xx">4XX</a></li>
	<li><a class="tab" href="" id="t5xx">5XX</a></li>
	<li><a class="tab" href="" id="t6xx">6XX</a></li>
	<li><a class="tab" href="" id="t7xx">7XX</a></li>
	<li><a class="tab" href="" id="t8xx">8XX</a></li>
	<li class="disabled"><a class="tab" href="" id="t9xx">9XX</a></li>
	<li><a class="tab" href="" id="ocultar">Ocultar Campos</a></li>
</ul>

<div id="0xx" class="tabs">

<table class="table">
	<tr>
		<th style="width: 10%;"><b>008</b></th>
		<th style="width: 45%;"><b>Códigos de información de longitud fija.</b></th>
		<th style="width: 45%;">
			<label id="l-008"><?php echo date('ymd', time()); ?></label>
			<?php echo $this->Form->hidden('008', array('id' => '008', 'label' => false, 'div' => false, 'value' => date('ymd', time()))); ?>
		</th>
	</tr>
	<tr>
		<td><b>008 [06]</b></td>
		<td>Tipo de fecha/estado de la publicación.</td>
		<td><?php echo $this->Form->input('008-06', array('id' => '008-06', 'label' => false, 'class' => 'form-control', 'div' => false, 
			'options' => array(
				'b' => 'b - No consta información; implica fechas A.C.',
				'c' => 'c - Recurso continuado con publicación en curso',
				'd' => 'd - Publicación cerrada',
				'e' => 'e - Fecha detallada',
				'i' => 'i - Fechas comprendidas en una colección',
				'k' => 'k - Rango de años del grueso de la colección',
				'm' => 'm - Fechas múltiples',
				'n' => 'n - Fecha desconocida',
				'p' => 'p - Fechas de distribución/estreno/edición y de sesión de producción/grabación cuando difiere',
				'q' => 'q - Fecha dudosa',
				'r' => 'r - Fechas de la reimpresión/reedición y del original',
				's' => 's - Fecha única conocida/probable',
				't' => 't - Fechas de publicación y de copyright',
				'u' => 'u - Estado desconocido',
				'|' => '| - No se utiliza'
			), 'selected' => 'c'
		)); ?></td>
	</tr>
	<tr>
		<td nowrap="nowrap"><b>008 [07-10]</b></td>
		<td>Primera fecha.</td>
		<td>
			<table id="008pf">
				<tr>
					<td>
						<?php echo $this->Form->input('008-07-10', array('id' => '008-07-10', 'label' => false, 'class' => 'form-control', 'div' => false,
						'options' => array(
							'pf' => 'Primera Fecha (aammdd)',
							'#' => '# - El elemento fecha no es aplicable',
							'u' => 'u - Fecha total o parcialmente desconocida',
							'||||' => '|||| - No se utiliza'
							)
						)); ?>
					</td>
					<td>
						<?php echo $this->Form->input('fecha1-008-07-10', array('id' => 'fecha008-07-10', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '6', 'value' => 'yymmdd')); ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap"><b>008 [11-14]</b></td>
		<td>Segunda fecha.</td>
		<td>
			<table id="008sf">
				<tr>
					<td>
						<?php echo $this->Form->input('008-11-14', array('id' => '008-11-14', 'label' => false, 'class' => 'form-control', 'div' => false,
						'options' => array(
							'sf' => 'Segunda Fecha (aammdd)',
							'#' => '# - El elemento fecha no es aplicable',
							'u' => 'u - Fecha total o parcialmente desconocida',
							'||||' => '|||| - No se utiliza'
							)
						)); ?>
					</td>
					<td>
						<?php echo $this->Form->input('fecha2-008-11-14', array('id' => 'fecha008-11-14', 'label' => false, 'class' => 'form-control', 'div' => false, 'maxlength' => '6', 'value' => 'yymmdd')); ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- <tr>
		<td><b>008[11-14]</b></td>
		<td>Segunda fecha.</td>
		<td><?php echo $this->Form->input('008-11-14', array('id' => '008-11-14', 'label' => false, 'class' => 'form-control', 'div' => false)); ?></td>
	</tr> -->
	<tr>
		<td nowrap="nowrap"><b>008 [15-17]</b></td>
		<td>Lugar de publicación, producción o ejecución.</td>
		<td><?php echo $this->Form->input('008-15-17', array('id' => '008-15-17', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'-aa' => 'Albania',
				'abc' => 'Alberta',
				'-ac' => 'Ashmore and Cartier Islands',
				'-ae' => 'Algeria',
				'-af' => 'Afghanistan',
				'-ag' => 'Argentina',
				'-ai' => 'Anguilla',
				'-ai' => 'Armenia (Republic)',
				'air' => 'Armenian S.S.R.',
				'-aj' => 'Azerbaijan',
				'ajr' => 'Azerbaijan S.S.R.',
				'aku' => 'Alaska',
				'alu' => 'Alabama',
				'-am' => 'Anguilla',
				'-an' => 'Andorra',
				'-ao' => 'Angola',
				'-aq' => 'Antigua and Barbuda',
				'aru' => 'Arkansas',
				'-as' => 'American Samoa',
				'-at' => 'Australia',
				'-au' => 'Austria',
				'-aw' => 'Aruba',
				'-ay' => 'Antarctica',
				'azu' => 'Arizona',
				'-ba' => 'Bahrain',
				'-bb' => 'Barbados',
				'bcc' => 'British Columbia',
				'-bd' => 'Burundi',
				'-be' => 'Belgium',
				'-bf' => 'Bahamas',
				'-bg' => 'Bangladesh',
				'-bh' => 'Belize',
				'-bi' => 'British Indian Ocean Territory',
				'-bl' => 'Brazil',
				'-bm' => 'Bermuda Islands',
				'-bn' => 'Bosnia and Hercegovina',
				'-bo' => 'Bolivia',
				'-bp' => 'Solomon Islands',
				'-br' => 'Burma',
				'-bs' => 'Botswana',
				'-bt' => 'Bhutan',
				'-bu' => 'Bulgaria',
				'-bv' => 'Bouvet Island',
				'-bw' => 'Belarus',
				'bwr' => 'Byelorussian S.S.R.',
				'-bx' => 'Brunei',
				'cau' => 'California',
				'-cb' => 'Cambodia',
				'-cc' => 'China',
				'-cd' => 'Chad',
				'-ce' => 'Sri Lanka',
				'-cf' => 'Congo (Brazzaville)',
				'-cg' => 'Congo (Democratic Republic)',
				'-ch' => 'China (Republic : 1949- )',
				'-ci' => 'Croatia',
				'-cj' => 'Cayman Islands',
				'-ck' => 'Colombia',
				'-cl' => 'Chile',
				'-cm' => 'Cameroon',
				'-cn' => 'Canada',
				'cou' => 'Colorado',
				'-cp' => 'Canton and Enderbury Islands',
				'-cq' => 'Comoros',
				'-cr' => 'Costa Rica',
				'-cs' => 'Czechoslovakia',
				'ctu' => 'Connecticut',
				'-cu' => 'Cuba',
				'-cv' => 'Cape Verde',
				'-cw' => 'Cook Islands',
				'-cx' => 'Central African Republic',
				'-cy' => 'Cyprus',
				'-cz' => 'Canal Zone',
				'dcu' => 'District of Columbia',
				'deu' => 'Delaware',
				'-dk' => 'Denmark',
				'-dm' => 'Benin',
				'-dq' => 'Dominica',
				'-dr' => 'Dominican Republic',
				'-ea' => 'Eritrea',
				'-ec' => 'Ecuador',
				'-eg' => 'Equatorial Guinea',
				'-em' => 'East Timor',
				'enk' => 'England',
				'-er' => 'Estonia',
				/*'err' => 'Estonia',*/
				'-es' => 'El Salvador',
				'-et' => 'Ethiopia',
				'-fa' => 'Faroe Islands',
				'-fg' => 'French Guiana',
				'-fi' => 'Finland',
				'-fj' => 'Fiji',
				'-fk' => 'Falkland Islands',
				'flu' => 'Florida',
				'-fm' => 'Micronesia (Federated States)',
				'-fp' => 'French Polynesia',
				'-fr' => 'France',
				'-fs' => 'Terres australes et antarctiques françaises',
				'-ft' => 'Djibouti',
				'gau' => 'GeorgiaCode Sequence',
				'-gb' => 'Kiribati',
				'-gd' => 'Grenada',
				'-ge' => 'Germany (East)',
				'-gh' => 'Ghana',
				'-gi' => 'Gibraltar',
				'-gl' => 'Greenland',
				'-gm' => 'Gambia',
				'-gn' => 'Gilbert and Ellice Islands',
				'-go' => 'Gabon',
				'-gp' => 'Guadeloupe',
				'-gr' => 'Greece',
				'-gs' => 'Georgia (Republic)',
				'gsr' => 'Georgian S.S.R.',
				'-gt' => 'Guatemala',
				'-gu' => 'Guam',
				'-gv' => 'Guinea',
				'-gw' => 'Germany',
				'-gy' => 'Guyana',
				'-gz' => 'Gaza Strip',
				'hiu' => 'Hawaii',
				'-hk' => 'Hong Kong',
				'-hm' => 'Heard and McDonald Islands',
				'-ho' => 'Honduras',
				'-ht' => 'Haiti',
				'-hu' => 'Hungary',
				'iau' => 'Iowa',
				'-ic' => 'Iceland',
				'idu' => 'Idaho',
				'-ie' => 'Ireland',
				'-ii' => 'India',
				'ilu' => 'Illinois',
				'inu' => 'Indiana',
				'-io' => 'Indonesia',
				'-iq' => 'Iraq',
				'-ir' => 'Iran',
				'-is' => 'Israel',
				'-it' => 'Italy',
				'-iu' => 'Israel-Syria Demilitarized Zones',
				'-iv' => "Côte d’Ivoire",
				'-iw' => 'Israel-Jordan Demilitarized Zones',
				'-iy' => 'Iraq-Saudi Arabia Neutral Zone',
				'-ja' => 'Japan',
				'-ji' => 'Johnston Atoll',
				'-jm' => 'Jamaica',
				'-jn' => 'Jan Mayen',
				'-jo' => 'Jordan',
				'-ke' => 'Kenya',
				'-kg' => 'Kyrgyzstan',
				'kgr' => 'Kirghiz S.S.R.',
				'-kn' => 'Korea (North)',
				'-ko' => 'Korea (South)',
				'ksu' => 'Kansas',
				'-ku' => 'Kuwait',
				'kyu' => 'Kentucky',
				'-kz' => 'Kazakhstan',
				'kzr' => 'Kazakh S.S.R.',
				'lau' => 'Louisiana',
				'-lb' => 'Liberia',
				'-le' => 'Lebanon',
				'-lh' => 'Liechtenstein',
				'-li' => 'Lithuania',
				/*'lir' => 'Lithuania',*/
				'-ln' => 'Central and Southern Line Islands',
				'-lo' => 'Lesotho',
				'-ls' => 'Laos',
				'-lu' => 'Luxembourg',
				'-lv' => 'Latvia',
				/*'lvr' => 'Latvia',*/
				'-ly' => 'Libya',
				'mau' => 'Massachusetts',
				'mbc' => 'Manitoba',
				'-mc' => 'Monaco',
				'mdu' => 'Maryland',
				'meu' => 'Maine',
				'-mf' => 'Mauritius',
				'-mg' => 'Madagascar',
				'-mh' => 'Macao',
				'miu' => 'Michigan',
				'-mj' => 'Montserrat',
				'-mk' => 'Oman',
				'-ml' => 'Mali',
				'-mm' => 'Malta',
				'mnu' => 'Minnesota',
				'mou' => 'Missouri',
				'-mp' => 'Mongolia',
				'-mq' => 'Martinique',
				'-mr' => 'Morocco',
				'msu' => 'Mississippi',
				'mtu' => 'Montana',
				'-mu' => 'Mauritania',
				'-mv' => 'Moldova',
				'mvr' => 'Moldavian S.S.R.',
				'-mw' => 'Malawi',
				'-mx' => 'Mexico',
				'-my' => 'Malaysia',
				'-mz' => 'Mozambique',
				'-na' => 'Netherlands Antilles',
				'nbu' => 'Nebraska',
				'ncu' => 'North Carolina',
				'ndu' => 'North Dakota',
				'-ne' => 'Netherlands',
				'nfc' => 'Newfoundland and Labrador',
				'-ng' => 'Niger',
				'nhu' => 'New Hampshire',
				'nik' => 'Northern Ireland',
				'nju' => 'New Jersey',
				'nkc' => 'New Brunswick',
				'-nl' => 'New CaledoniaCode Sequence',
				'-nm' => 'Northern Mariana Islands',
				'nmu' => 'New Mexico',
				'-nn' => 'Vanuatu',
				'-no' => 'Norway',
				'-np' => 'Nepal',
				'-nq' => 'Nicaragua',
				'-nr' => 'Nigeria',
				'nsc' => 'Nova Scotia',
				'ntc' => 'Northwest Territories',
				'-nu' => 'Nauru',
				'nuc' => 'Nunavut',
				'nvu' => 'Nevada',
				'-nx' => 'Norfolk Island',
				'nyu' => 'New York (State)',
				'-nz' => 'New Zealand',
				'ohu' => 'Ohio',
				'oku' => 'Oklahoma',
				'onc' => 'Ontario',
				'oru' => 'Oregon',
				'-ot' => 'Mayotte',
				'pau' => 'Pennsylvania',
				'-pc' => 'Pitcairn Island',
				'-pe' => 'Peru',
				'-pf' => 'Paracel Islands',
				'-pg' => 'Guinea-Bissau',
				'-ph' => 'Philippines',
				'pic' => 'Prince Edward Island',
				'-pk' => 'Pakistan',
				'-pl' => 'Poland',
				'-pn' => 'Panama',
				'-po' => 'Portugal',
				'-pp' => 'Papua New Guinea',
				'-pr' => 'Puerto Rico',
				'-pt' => 'Portuguese Timor',
				'-pw' => 'Palau',
				'-py' => 'Paraguay',
				'-qa' => 'Qatar',
				'quc' => 'Québec (Province)',
				'-re' => 'Réunion',
				'-rh' => 'Zimbabwe',
				'riu' => 'Rhode Island',
				'-rm' => 'Romania',
				'-ru' => 'Russia (Federation)',
				'rur' => 'Russian S.F.S.R.',
				'-rw' => 'Rwanda',
				'-ry' => 'Ryukyu Islands, Southern',
				'-sa' => 'South Africa',
				'-sb' => 'Svalbard',
				'scu' => 'South Carolina',
				'sdu' => 'South Dakota',
				'-se' => 'Seychelles',
				'-sf' => 'Sao Tome and Principe',
				'-sg' => 'Senegal',
				'-sh' => 'Spanish North Africa',
				'-si' => 'Singapore',
				'-sj' => 'Sudan',
				'-sk' => 'Sikkim',
				'-sl' => 'Sierra Leone',
				'-sm' => 'San Marino',
				'snc' => 'Saskatchewan',
				'-so' => 'Somalia',
				'-sp' => 'Spain',
				'-sq' => 'Swaziland',
				'-sr' => 'Surinam',
				'-ss' => 'Western Sahara',
				'stk' => 'Scotland',
				'-su' => 'Saudi Arabia',
				'-sv' => 'Swan Islands',
				'-sw' => 'Sweden',
				'-sx' => 'Namibia',
				'-sy' => 'Syria',
				'-sz' => 'Switzerland',
				'-ta' => 'Tajikistan',
				'tar' => 'Tajik S.S.R.',
				'-tc' => 'Turks and Caicos Islands',
				'-tg' => 'Togo',
				'-th' => 'Thailand',
				'-ti' => 'Tunisia',
				'-tk' => 'Turkmenistan',
				'tkr' => 'Turkmen S.S.R.',
				'-tl' => 'Tokelau',
				'tnu' => 'Tennessee',
				'-to' => 'Tonga',
				'-tr' => 'Trinidad and Tobago',
				'-ts' => 'United Arab Emirates',
				'-tt' => 'Trust Territory of the Pacific Islands',
				'-tu' => 'Turkey',
				'-tv' => 'Tuvalu',
				'txu' => 'Texas',
				'-tz' => 'Tanzania',
				'-ua' => 'Egypt',
				'-uc' => 'United States Misc. Caribbean Islands',
				'-ug' => 'Uganda',
				'-ui' => 'United Kingdom Misc. Islands',
				/*'uik' => 'United Kingdom Misc. Islands',*/
				'-uk' => 'United Kingdom',
				'-un' => 'Ukraine',
				/*'unr' => 'Ukraine',*/
				'-up' => 'United States Misc. Pacific Islands',
				'-ur' => 'Soviet Union',
				'-us' => 'United States',
				'utu' => 'Utah',
				'-uv' => 'Burkina Faso',
				'-uy' => 'Uruguay',
				'-uz' => 'Uzbekistan',
				'uzr' => 'Uzbek S.S.R.Code Sequence',
				'vau' => 'Virginia',
				'-vb' => 'British Virgin Islands',
				'-vc' => 'Vatican City',
				'-ve' => 'Venezuela',
				'-vi' => 'Virgin Islands of the United States',
				'-vm' => 'Vietnam',
				'-vn' => 'Vietnam, North',
				'-vp' => 'Various places',
				'-vs' => 'Vietnam, South',
				'vtu' => 'Vermont',
				'wau' => 'Washington (State)',
				'-wb' => 'West Berlin',
				'-wf' => 'Wallis and Futuna',
				'wiu' => 'Wisconsin',
				'-wj' => 'West Bank of the Jordan River',
				'-wk' => 'Wake Island',
				'wlk' => 'Wales',
				'-ws' => 'Samoa',
				'wvu' => 'West Virginia',
				'wyu' => 'Wyoming',
				'-xa' => 'Christmas Island (Indian Ocean)',
				'-xb' => 'Cocos (Keeling)Islands',
				'-xc' => 'Maldives',
				'-xd' => 'Saint Kitts-Nevis',
				'-xe' => 'Marshall Islands',
				'-xf' => 'Midway Islands',
				'-xh' => 'Niue',
				'-xi' => 'Saint Kitts-Nevis-Anguilla',
				'-xj' => 'Saint Helena',
				'-xk' => 'Saint Lucia',
				'-xl' => 'Saint Pierre and Miquelon',
				'-xm' => 'Saint Vincent and the Grenadines',
				'-xn' => 'Macedonia',
				'-xo' => 'Slovakia',
				'-xp' => 'Spratly Island',
				'-xr' => 'Czech Republic',
				'-xs' => 'South Georgia and the South Sandwich Islands',
				'-xv' => 'Slovenia',
				'xxx' => 'No place, unknown, or undetermined',
				/*'xxc' => 'Canada',
				'xxk' => 'United Kingdom',*/
				/*'xxr' => 'Soviet Union',*/
				/*'xxu' => 'United States',*/
				'-ye' => 'Yemen',
				'ykc' => 'Yukon Territory',
				'-ys' => 'Yemen (People’s Democratic Republic)',
				'-yu' => 'Serbia and Montenegro',
				'-za' => 'Zambia'
			), 'default' => 'xxx'
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [18]</b></td>
		<td>Periodicidad.</td>
		<td><?php echo $this->Form->input('008-18', array('id' => '008-18', 'label' => false, 'class' => 'form-control', 'div' => false, 
			'options' => array(
				'#' => '# - Periodicidad no determinada',
				'a' => 'a - Anual',
				'b' => 'b - Bimestral',
				'c' => 'c - Bisemanal',
				'd' => 'd - Diaria',
				'e' => 'e - Bimensual',
				'f' => 'f - Semestral',
				'g' => 'g - Bienal',
				'h' => 'h - Trienal',
				'j' => 'j - Trimensual',
				'k' => 'k - Actualizado de forma continuada',
				'm' => 'm - Mensual',
				'q' => 'q - Trimestral',
				's' => 's - Quincenal',
				't' => 't - Cuatrimestral',
				'u' => 'u - Desconocido',
				'w' => 'w - Semanal',
				'z' => 'z - Otro',
				'|' => '| - No se utiliza'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [19]</b></td>
		<td>Regularidad.</td>
		<td><?php echo $this->Form->input('008-19', array('id' => '008-19', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'n' => 'n - Irregular normalizada',
				'r' => 'r - Regular',
				'u' => 'u - Desconocida',
				'x' => 'x - Completamente irregular',
				'|' => '| - No se utiliza'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [20]</b></td>
		<td>No definida.</td>
		<td><?php echo $this->Form->input('008-20', array('id' => '008-20', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'#' => '# - No definida'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [21]</b></td>
		<td>Tipo de recurso continuado.</td>
		<td><?php echo $this->Form->input('008-21', array('id' => '008-21', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'#' => '# - Ninguno de los siguientes',
				'd' => 'd - Base de datos actualizable',
				'l' => 'l - Hojas sueltas actualizables',
				'm' => 'm - Serie monográfica',
				'n' => 'n - Periódico',
				'p' => 'p - Revista',
				'w' => 'w - Sitio web actualizable',
				'|' => '| - No se utiliza'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>008 [35-37]</b></td>
		<td>Lengua.</td>
		<td><?php echo $this->Form->input('008-35-37', array('id' => '008-35-37', 'label' => false, 'class' => 'form-control', 'div' => false,
			'options' => array(
				'aar' => 'Afar',
				'abk' => 'Abkhaz',
				'ace' => 'Achinese',
				'ach' => 'Acoli',
				'ada' => 'Adangme',
				'ady' => 'Adygei',
				'afa' => 'Afroasiatic (Other)',
				'afh' => 'Afrihili (Artificial language)',
				'afr' => 'Afrikaans',
				'ain' => 'Ainu',
				'ajm' => 'Aljamía',
				'aka' => 'Akan',
				'akk' => 'Akkadian',
				'alb' => 'Albanian',
				'ale' => 'Aleut',
				'alg' => 'Algonquian (Other)',
				'alt' => 'Altai',
				'amh' => 'Amharic',
				'ang' => 'English, Old (ca. 450-1100)',
				'anp' => 'Angika',
				'apa' => 'Apache languages',
				'ara' => 'Arabic',
				'arc' => 'Aramaic',
				'arg' => 'Aragonese Spanish',
				'arm' => 'Armenian',
				'arn' => 'Mapuche',
				'arp' => 'Arapaho',
				'art' => 'Artificial (Other)',
				'arw' => 'Arawak',
				'asm' => 'Assamese',
				'ast' => 'Bable',
				'ath' => 'Athapascan (Other)',
				'aus' => 'Australian languages',
				'ava' => 'Avaric',
				'ave' => 'Avestan',
				'awa' => 'Awadhi',
				'aym' => 'Aymara',
				'aze' => 'Azerbaijani',
				'bad' => 'Banda languages',
				'bai' => 'Bamileke languages',
				'bak' => 'Bashkir',
				'bal' => 'Baluchi',
				'bam' => 'Bambara',
				'ban' => 'Balinese',
				'baq' => 'Basque',
				'bas' => 'Basa',
				'bat' => 'Baltic (Other)',
				'bej' => 'Beja',
				'bel' => 'Belarusian',
				'bem' => 'Bemba',
				'ben' => 'Bengali',
				'ber' => 'Berber (Other)',
				'bho' => 'Bhojpuri',
				'bih' => 'Bihari',
				'bik' => 'Bikol',
				'bin' => 'Edo',
				'bis' => 'Bislama',
				'bla' => 'Siksika',
				'bnt' => 'Bantu (Other)',
				'bos' => 'Bosnian',
				'bra' => 'Braj',
				'bre' => 'Breton',
				'btk' => 'Batak',
				'bua' => 'Buriat',
				'bug' => 'Bugis',
				'bul' => 'Bulgarian',
				'bur' => 'Burmese',
				'byn' => 'Bilin',
				'cad' => 'Caddo',
				'cai' => 'Central American Indian (Other)',
				'cam' => 'Khmer',
				'car' => 'Carib',
				'cat' => 'Catalan',
				'cau' => 'Caucasian (Other)',
				'ceb' => 'Cebuano',
				'cel' => 'Celtic (Other)',
				'cha' => 'Chamorro',
				'chb' => 'Chibcha',
				'che' => 'Chechen',
				'chg' => 'Chagatai',
				'chi' => 'Chinese',
				'chk' => 'Chuukese',
				'chm' => 'Mari',
				'chn' => 'Chinook jargon',
				'cho' => 'Choctaw',
				'chp' => 'Chipewyan',
				'chr' => 'Cherokee',
				'chu' => 'Church Slavic',
				'chv' => 'Chuvash',
				'chy' => 'Cheyenne',
				'cmc' => 'Chamic languages',
				'cop' => 'Coptic',
				'cor' => 'Cornish',
				'cos' => 'Corsican',
				'cpe' => 'Creoles and Pidgins, French-based (Other)',
				'cpf' => 'Creoles and Pidgins, Portuguese-based (Other)',
				'cre' => 'Cree',
				'crh' => 'Crimean Tatar',
				'crp' => 'Creoles and Pidgins (Other)',
				'csb' => 'Kashubian',
				'cus' => 'Cushitic (Other)',
				'cze' => 'Czech',
				'dak' => 'Dakota',
				'dan' => 'Danish',
				'dar' => 'Dargwa',
				'day' => 'Dayak',
				'del' => 'Delaware',
				'den' => 'Slave',
				'dgr' => 'Dogrib',
				'din' => 'Dinka',
				'div' => 'Divehi',
				'doi' => 'Dogri',
				'dra' => 'Dravidian (Other)',
				'dsb' => 'Lower Sorbian',
				'dua' => 'Duala',
				'dum' => 'Dutch, Middle (ca. 1050-1350)',
				'dut' => 'Dutch',
				'dyu' => 'Dyula',
				'dzo' => 'Dzongkha',
				'efi' => 'Efik',
				'egy' => 'Egyptian',
				'eka' => 'Ekajuk',
				'elx' => 'Elamite',
				'eng' => 'English',
				'enm' => 'English, Middle (1100-1500)',
				'epo' => 'Esperanto',
				'esk' => 'Eskimo languages',
				'esp' => 'Esperanto',
				'est' => 'Estonian',
				'eth' => 'Ethiopic',
				'ewe' => 'Ewe',
				'ewo' => 'Ewondo',
				'fan' => 'Fang',
				'fao' => 'Faroese',
				'far' => 'Faroese',
				'fat' => 'Fanti',
				'fij' => 'Fijian',
				'fil' => 'Filipino',
				'fin' => 'Finnish',
				'fiu' => 'Finno-Ugrian (Other)',
				'fon' => 'Fon',
				'fre' => 'French',
				'fri' => 'Frisian',
				'frm' => 'French, Middle (ca. 1300-1600)',
				'fro' => 'French, Old (ca. 842-1300)',
				'frr' => 'North Frisian',
				'frs' => 'East Frisian',
				'fry' => 'Frisian',
				'ful' => 'Fula',
				'fur' => 'Friulian',
				'gaa' => 'Gã',
				'gae' => 'Scottish Gaelix',
				'gag' => 'Galician',
				'gal' => 'Oromo',
				'gay' => 'Gayo',
				'gba' => 'Gbaya',
				'gem' => 'Germanic (Other)',
				'geo' => 'Georgian',
				'ger' => 'German',
				'gez' => 'Ethiopic',
				'gil' => 'Gilbertese',
				'gla' => 'Scottish Gaelic',
				'gle' => 'Irish',
				'glg' => 'Galician',
				'glv' => 'Manx',
				'gmh' => 'German, Middle High (ca. 1050-1500)',
				'goh' => 'German, Old High (ca. 750-1050)',
				'gon' => 'Gondi',
				'gor' => 'Gorontalo',
				'got' => 'Gothic',
				'grb' => 'Grebo',
				'grc' => 'Greek, Ancient (to 1453)',
				'gre' => 'Greek, Modern (1453- )',
				'grn' => 'Guarani',
				'gsw' => 'Swiss German',
				'gua' => 'Guarani',
				'guj' => 'Gujarati',
				'gwi' => "Gwich'in",
				'hai' => 'Haida',
				'hat' => 'Haitian French Creole',
				'hau' => 'Hausa',
				'haw' => 'Hawaiian',
				'heb' => 'Hebrew',
				'her' => 'Herero',
				'hil' => 'Hiligaynon',
				'him' => 'Himachali',
				'hin' => 'Hindi',
				'hit' => 'Hittite',
				'hmn' => 'Hmong',
				'hmo' => 'Hiri Motu',
				'hsb' => 'Upper Sorbian',
				'hun' => 'Hungarian',
				'iba' => 'Iban',
				'ibo' => 'Igbo',
				'ice' => 'Icelandic',
				'ido' => 'Ido',
				'iii' => 'Sichuan Yi',
				'ijo' => 'Ijo',
				'iku' => 'Inuktitut',
				'ile' => 'Interlingue',
				'ilo' => 'Iloko',
				'inc' => 'Indic (Other)',
				'ind' => 'Indonesian',
				'ine' => 'Indo-European (Other)',
				'inh' => 'Ingush',
				'ipk' => 'Inupiaq',
				'ira' => 'Iranian (Other)',
				'iri' => 'Irish',
				'iro' => 'Iroquoian (Other)',
				'ita' => 'Italian',
				'jav' => 'Javanese',
				'jbo' => 'Lojban (Artificial language)',
				'jpn' => 'Japanese',
				'jpr' => 'Judeo-Persian',
				'jrb' => 'Judeo-Arabic',
				'kaa' => 'Kara-Kalpak',
				'kab' => 'Kabyle',
				'kac' => 'Kachin',
				'kal' => 'Kalâtdlisut',
				'kam' => 'Kamba',
				'kan' => 'Kannada',
				'kar' => 'Karen languages',
				'kas' => 'Kashmiri',
				'kau' => 'Kanuri',
				'kaw' => 'Kawi',
				'kaz' => 'Kazakh',
				'kbd' => 'Kabardian',
				'kha' => 'Khasi',
				'khi' => 'Khoisan (Other)',
				'khm' => 'Khmer',
				'kho' => 'Khotanese',
				'kik' => 'Kikuyu',
				'kin' => 'Kinyarwanda',
				'kir' => 'Kyrgyz',
				'kmb' => 'Kimbundu',
				'kok' => 'Konkani',
				'kom' => 'Komi',
				'kon' => 'Kongo',
				'kor' => 'Korean',
				'kos' => 'Kusaie',
				'kpe' => 'Kpelle',
				'krc' => 'Karachay-Balkar',
				'krl' => 'Karelian',
				'kro' => 'Kru (Other)',
				'kru' => 'Kurukh',
				'kua' => 'Kuanyama',
				'kum' => 'Kumyk',
				'kur' => 'Kurdish',
				'kus' => 'Kusaie',
				'kut' => 'Kootenai',
				'lad' => 'Ladino',
				'lah' => 'Lahndā',
				'lam' => 'Lamba (Zambia and Congo)',
				'lan' => 'Occitan (post 1500)',
				'lao' => 'Lao',
				'lap' => 'Sami',
				'lat' => 'Latin',
				'lav' => 'Latvian',
				'lez' => 'Lezgian',
				'lim' => 'Limburgish',
				'lin' => 'Lingala',
				'lit' => 'Lithuanian',
				'lol' => 'Mongo-Nkundu',
				'loz' => 'Lozi',
				'ltz' => 'Luxembourgish',
				'lua' => 'Luba-Lulua',
				'lub' => 'Luba-Katanga',
				'lug' => 'Ganda',
				'lui' => 'Luiseño',
				'lun' => 'Lunda',
				'luo' => 'Luo (Kenya and Tanzania)',
				'lus' => 'Lushai',
				'mac' => 'Macedonian',
				'mad' => 'Madurese',
				'mag' => 'Magahi',
				'mah' => 'Marshallese',
				'mai' => 'Maithili',
				'mak' => 'Makasar',
				'mal' => 'Malayalam',
				'man' => 'Mandingo',
				'mao' => 'Maori',
				'map' => 'Austronesian (Other)',
				'mar' => 'Marathi',
				'mas' => 'Masai',
				'max' => 'Manx',
				'may' => 'Malay',
				'mdf' => 'Moksha',
				'mdr' => 'Mandar',
				'men' => 'Mende',
				'mic' => 'Micmac',
				'min' => 'Minangkabau',
				'mis' => 'Miscellaneous languages',
				'mkh' => 'Mon-Khmer (Other)',
				'mla' => 'Malagasy',
				'mlg' => 'Malagasy',
				'mlt' => 'Maltese',
				'mnc' => 'Manchu',
				'mni' => 'Manipuri',
				'mno' => 'Manobo languages',
				'moh' => 'Mohawk',
				'mol' => 'Moldavian',
				'mon' => 'Mongolian',
				'mos' => 'Mooré',
				'mul' => 'Multiple languages',
				'mun' => 'Munda (Other)',
				'mus' => 'Creek',
				'mwl' => 'Mirandese',
				'mwr' => 'Marwari',
				'myn' => 'Mayan languages',
				'myv' => 'Erzya',
				'nah' => 'Nahuatl',
				'nai' => 'North American Indian (Other)',
				'nap' => 'Neapolitan Italian',
				'nau' => 'Nauru',
				'nav' => 'Navajo',
				'nbl' => 'Ndebele (South Africa)',
				'nde' => 'Ndebele (Zimbabwe)',
				'ndo' => 'Ndonga',
				'nds' => 'Low German',
				'nep' => 'Nepali',
				'new' => 'Newari',
				'nia' => 'Nias',
				'nic' => 'Niger-Kordofanian (Other)',
				'niu' => 'Niuean',
				'nno' => 'Norwegian (Nynorsk)',
				'nob' => 'Norwegian (Bokmål)',
				'nog' => 'Nogai',
				'non' => 'Old Norse',
				'nor' => 'Norwegian',
				'nqo' => "N'Ko",
				'nso' => 'Northern Sotho',
				'nub' => 'Nubian languages',
				'nwc' => 'Newari, Old',
				'nya' => 'Nyanja',
				'nym' => 'Nyamwezi',
				'nyn' => 'Nyankole',
				'nyo' => 'Nyoro',
				'nzi' => 'Nzima',
				'oci' => 'Occitan (post 1500)',
				'oji' => 'Ojibwa',
				'ori' => 'Oriya',
				'orm' => 'Oromo',
				'osa' => 'Osage',
				'oss' => 'Ossetic',
				'ota' => 'Turkish, Ottoman',
				'oto' => 'Otomian languages',
				'paa' => 'Papuan (Other)',
				'pag' => 'Pangasinan',
				'pal' => 'Pahlavi',
				'pam' => 'Pampanga',
				'pan' => 'Panjabi',
				'pap' => 'Papiamento',
				'pau' => 'Palauan',
				'peo' => 'Old Persian (ca. 600-400 B.C.)',
				'per' => 'Persian',
				'phi' => 'Philippine (Other)',
				'phn' => 'Phoenician',
				'pli' => 'Pali',
				'pol' => 'Polish',
				'pon' => 'Ponape',
				'por' => 'Portuguese',
				'pra' => 'Prakrit languages',
				'pro' => 'Provençal (to 1500)',
				'pus' => 'Pushto',
				'que' => 'Quechua',
				'raj' => 'Rajasthani',
				'rap' => 'Rapanui',
				'rar' => 'Rarotongan',
				'roa' => 'Romance (Other)',
				'roh' => 'Raeto-Romance',
				'rom' => 'Romani',
				'rum' => 'Romanian',
				'run' => 'Rundi',
				'rup' => 'Aromanian',
				'rus' => 'Russian',
				'sad' => 'Sandawe',
				'sag' => 'Sango (Ubangi Creole)',
				'sah' => 'Yakut',
				'sai' => 'South American Indian (Other)',
				'sal' => 'Salishan languages',
				'sam' => 'Samaritan Aramaic',
				'san' => 'Sanskrit',
				'sao' => 'Samoan',
				'sas' => 'Sasak',
				'sat' => 'Santali',
				'scc' => 'Serbian',
				'scn' => 'Sicilian Italian',
				'sco' => 'Scots',
				'scr' => 'Croatian',
				'sel' => 'Selkup',
				'sga' => 'Irish, Old (to 1100)',
				'sgn' => 'Sign languages',
				'shn' => 'Shan',
				'sho' => 'Shona',
				'sid' => 'Sidamo',
				'sin' => 'Sinhalese',
				'sio' => 'Siouan (Other)',
				'sit' => 'Sino-Tibetan (Other)',
				'sla' => 'Slavic (Other)',
				'slo' => 'Slovak',
				'slv' => 'Slovenian',
				'sma' => 'Southern Sami',
				'sme' => 'Northern Sami',
				'smi' => 'Sami',
				'smj' => 'Lule Sami',
				'smn' => 'Inari Sami',
				'smo' => 'Samoan',
				'sms' => 'Skolt Sami',
				'sna' => 'Shona',
				'snd' => 'Sindhi',
				'snh' => 'Sinhalese',
				'snk' => 'Soninke',
				'sog' => 'Sogdian',
				'som' => 'Somali',
				'son' => 'Songhai',
				'sot' => 'Sotho',
				'spa' => 'Spanish',
				'srd' => 'Sardinian',
				'srn' => 'Sranan',
				'srr' => 'Serer',
				'ssa' => 'Nilo-Saharan (Other)',
				'sso' => 'Sotho',
				'ssw' => 'Swazi',
				'suk' => 'Sukuma',
				'sun' => 'Sundanese',
				'sus' => 'Susu',
				'sux' => 'Sumerian',
				'swa' => 'Swahili',
				'swe' => 'Swedish',
				'swz' => 'Swazi',
				'syc' => 'Syriac',
				'syr' => 'Syriac, Modern',
				'tag' => 'Tagalog',
				'tah' => 'Tahitian',
				'tai' => 'Tai (Other)',
				'taj' => 'Tajik',
				'tam' => 'Tamil',
				'tar' => 'Tatar',
				'tat' => 'Tatar',
				'tel' => 'Telugu',
				'tem' => 'Temne',
				'ter' => 'Terena',
				'tet' => 'Tetum',
				'tgk' => 'Tajik',
				'tgl' => 'Tagalog',
				'tha' => 'Thai',
				'tib' => 'Tibetan',
				'tig' => 'Tigré',
				'tir' => 'Tigrinya',
				'tiv' => 'Tiv',
				'tkl' => 'Tokelauan',
				'tlh' => 'Klingon (Artificial language)',
				'tli' => 'Tlingit',
				'tmh' => 'Tamashek',
				'tog' => 'Tonga (Nyasa)',
				'ton' => 'Tongan',
				'tpi' => 'Tok Pisin',
				'tru' => 'Truk',
				'tsi' => 'Tsimshian',
				'tsn' => 'Tswana',
				'tso' => 'Tsonga',
				'tsw' => 'Tswana',
				'tuk' => 'Turkmen',
				'tum' => 'Tumbuka',
				'tup' => 'Tupi languages',
				'tur' => 'Turkish',
				'tut' => 'Altaic (Other)',
				'tvl' => 'Tuvaluan',
				'twi' => 'Twi',
				'tyv' => 'Tuvinian',
				'udm' => 'Udmurt',
				'uga' => 'Ugaritic',
				'uig' => 'Uighur',
				'ukr' => 'Ukrainian',
				'umb' => 'Umbundu',
				'und' => 'Undetermined',
				'urd' => 'Urdu',
				'uzb' => 'Uzbek',
				'vai' => 'Vai',
				'ven' => 'Venda',
				'vie' => 'Vietnamese',
				'vol' => 'Volapük',
				'vot' => 'Votic',
				'wak' => 'Wakashan languages',
				'wal' => 'Wolayta',
				'war' => 'Waray',
				'was' => 'Washo',
				'wel' => 'Welsh',
				'wen' => 'Sorbian (Other)',
				'wln' => 'Walloon',
				'wol' => 'Wolof',
				'xho' => 'Xhosa',
				'yao' => 'Yao (Africa)',
				'yap' => 'Yapese',
				'yid' => 'Yiddish',
				'yor' => 'Yoruba',
				'ypk' => 'Yupik languages',
				'zap' => 'Zapotec',
				'zbl' => 'Blissymbolics',
				'zen' => 'Zenaga',
				'zha' => 'Zhuang',
				'znd' => 'Zande languages',
				'zul' => 'Zulu',
				'zun' => 'Zuni',
				'zxx' => 'No linguistic content',
				'zza' => 'Zaza'
			), 'default' => 'und'
		)); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>017</b></th>
		<th style="width: 45%;"><b>Número de copyright o de depósito legal.</b></th>
		<th style="width: 45%;">
			<label id="l-017">&nbsp;</label>
			<?php echo $this->Form->hidden('017', array('id' => '017', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Número de copyright o de depósito legal.</td>
		<td><?php echo $this->Form->input('017a', array('id' => '017a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>020</b></th>
		<th style="width: 45%;"><b>Número Internacional Normalizado para Libros (ISBN).</b></th>
		<th style="width: 45%;">
			<label id="l-020">&nbsp;</label>
			<?php echo $this->Form->hidden('020', array('id' => '020', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>ISBN.</td>
		<td><?php echo $this->Form->input('020a', array('id' => '020a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Términos de disponibilidad.</td>
		<td><?php echo $this->Form->input('020c', array('id' => '020c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>ISBN Inválido/Cancelado.</td>
		<td><?php echo $this->Form->input('020z', array('id' => '020z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>022</b></th>
		<th style="width: 45%;"><b>Número Internacional Normalizado para Publicaciones Seriadas (ISSN).</b></th>
		<th style="width: 45%;">
			<label id="l-022">&nbsp;</label>
			<?php echo $this->Form->hidden('022', array('id' => '022', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>ISSN.</td>
		<td><?php echo $this->Form->input('022a', array('id' => '022a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>ISSN incorrecto.</td>
		<td><?php echo $this->Form->input('022y', array('id' => '022y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>ISSN cancelado.</td>
		<td><?php echo $this->Form->input('022z', array('id' => '022z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>024</b></th>
		<th style="width: 45%;"><b>Otros identificadores normalizados (ISMN).</b></th>
		<th style="width: 45%;">
			<label id="l-024">&nbsp;</label>
			<?php echo $this->Form->hidden('024', array('id' => '024', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de número normalizado o código Indicador de diferencia.</td>
		<td><?php echo $this->Form->input('024i1', array('id' => '024i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - CCódigo Internacional Normalizado para Grabaciones ',
				'1' => '1 - Código Universal de Producto',
				'2' => '2 - Número Internacional Normalizado para Música',
				'3' => '3 - Número Internacional de Artículo',
				'4' => '4 - Identificador de Número y Contribución de Publicación Seriada'
			), 'selected' => '2'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('024i2', array('id' => '024i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No se proporciona información',
					'0' => '0 -  No hay diferencia',
					'1'=> '1 - Hay diferencia '
				), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>ISMN.</td>
		<td><?php echo $this->Form->input('024a', array('id' => '024a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>ISMN incorrecto.</td>
		<td><?php echo $this->Form->input('024y', array('id' => '024y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>028</b></th>
		<th style="width: 45%;"><b>Número de plancha.</b></th>
		<th style="width: 45%;">
			<label id="l-028">&nbsp;</label>
			<?php echo $this->Form->hidden('028', array('id' => '028', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Número de plancha.</td>
		<td><?php echo $this->Form->input('028a', array('id' => '028a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fuente del número de plancha.</td>
		<td><?php echo $this->Form->input('028b', array('id' => '028b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>031</b></th>
		<th style="width: 45%;"><b>Información del íncipit musical.</b></th>
		<th style="width: 45%;">
			<label id="l-031">&nbsp;</label>
			<?php echo $this->Form->hidden('031', array('id' => '031', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Número de una obra.</td>
		<td><?php echo $this->Form->input('031a', array('id' => '031a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Número de movimiento.</td>
		<td><?php echo $this->Form->input('031b', array('id' => '031b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Número de íncipit.</td>
		<td><?php echo $this->Form->input('031c', array('id' => '031c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Voz o instrumento.</td>
		<td><?php echo $this->Form->input('031d', array('id' => '031d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Rol.</td>
		<td><?php echo $this->Form->input('031e', array('id' => '031e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$f</b></td>
		<td>Nombre del movimiento.</td>
		<td><?php echo $this->Form->input('031f', array('id' => '031f', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
		<tr>
		<td><b>$g</b></td>
		<td> Tonalidad o modo.</td>
		<td><?php echo $this->Form->input('031g', array('id' => '031g', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$m</b></td>
		<td>Clave.</td>
		<td><?php echo $this->Form->input('031m', array('id' => '031m', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Armadura de clave.</td>
		<td><?php echo $this->Form->input('031n', array('id' => '031n', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$o</b></td>
		<td>Compás.</td>
		<td><?php echo $this->Form->input('031o', array('id' => '031o', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Notación musical codificada.</td>
		<td><?php echo $this->Form->input('031p', array('id' => '031p', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$q</b></td>
		<td>Nota general.</td>
		<td><?php echo $this->Form->input('031q', array('id' => '031q', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$r</b></td>
		<td>Nota codificada de validación.</td>
		<td><?php echo $this->Form->input('031r', array('id' => '031r', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$s</b></td>
		<td> Íncipit literario.</td>
		<td><?php echo $this->Form->input('031s', array('id' => '031s', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td> Íncipit literario <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('031t', array('id' => '031t', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Identificador de recurso uniforme.</td>
		<td><?php echo $this->Form->input('031u', array('id' => '031u', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Idioma del texto.</td>
		<td><?php echo $this->Form->input('031z', array('id' => '031z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	
</table>


<table class="table">
	<tr>
		<th style="width: 10%;"><b>040</b></th>
		<th style="width: 45%;"><b>Fuente de la catalogación.</b></th>
		<th style="width: 45%;">
			<label id="l-040">&nbsp;</label>
			<?php echo $this->Form->hidden('040', array('id' => '040', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Centro catalogador de origen.</td>
		<td><?php echo $this->Form->input('040a', array('id' => '040a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>041</b></th>
		<th style="width: 45%;"><b>Código de lengua.</b></th>
		<th style="width: 45%;">
			<label id="l-041">&nbsp;</label>
			<?php echo $this->Form->hidden('041', array('id' => '041', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Indicación de traducción.</td>
		<td><?php echo $this->Form->input('041i1', array('id' => '041i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - El documento no es ni incluye una traducción',
				'1' => '1 - El documento es o incluye una traducción'
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Fuente del código.</td>
		<td><?php echo $this->Form->input('041i2', array('id' => '041i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - Código MARC de lengua',
					'7' => '7 - Fuente especificada en el subcampo $b'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Código del idioma.</td>
		<td><?php echo $this->Form->input('041a', array('id' => '041a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Código de idioma del sumario o resumen.</td>
		<td><?php echo $this->Form->input('041b', array('id' => '041b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Código de idioma original.</td>
		<td><?php echo $this->Form->input('041h', array('id' => '041h', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>044</b></th>
		<th style="width: 45%;"><b>Código del país de la entidad editora/productora.</b></th>
		<th style="width: 45%;">
			<label id="l-044">&nbsp;</label>
			<?php echo $this->Form->hidden('044', array('id' => '044', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Código MARC del país.</td>
		<td><?php echo $this->Form->input('044a', array('id' => '044a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>047</b></th>
		<th style="width: 45%;"><b>Código de forma de composición .</b></th>
		<th style="width: 45%;">
			<label id="l-047">&nbsp;</label>
			<?php echo $this->Form->hidden('047', array('id' => '047', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Código de la forma de composición.</font>.</td>
		<td><?php echo $this->Form->input('047a', array('id' => '047a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>048</b></th>
		<th style="width: 45%;"><b>Número de instrumentos y voces.</b></th>
		<th style="width: 45%;">
			<label id="l-048">&nbsp;</label>
			<?php echo $this->Form->hidden('048', array('id' => '048', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('048i1', array('id' => '048i1', 'label' => false, 'div' => false,  'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido',
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Fuente del código.</td>
		<td><?php echo $this->Form->input('048i2', array('id' => '048i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - Código MARC',
				'7'	=>	'7 - Fuente especificada en el subcampo $2',
				), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Código de ejecutante o conjunto.</font>.</td>
		<td><?php echo $this->Form->input('048a', array('id' => '048a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Código del solista.</font>.</td>
		<td><?php echo $this->Form->input('048b', array('id' => '048b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>049</b></th>
		<th style="width: 45%;"><b>Autor o material venezolano.</b></th>
		<th style="width: 45%;">
			<label id="l-049">&nbsp;</label>
			<?php echo $this->Form->hidden('049', array('id' => '049', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Autor venezolano.</td>
		<td><?php echo $this->Form->input('049a', array('id' => '049a', 'label' => false, 'div' => false)); ?></td>
	</tr>
		<tr>
		<td><b>$b</b></td>
		<td>Material venezolano.</td>
		<td><?php echo $this->Form->input('049b', array('id' => '049b', 'label' => false, 'div' => false)); ?></td>
	</tr>
</table>



<table class="table">
	<tr>
		<th style="width: 10%;"><b>082</b></th>
		<th style="width: 45%;"><b>Número de la Clasificación Decimal Dewey.</b></th>
		<th style="width: 45%;">
			<label id="l-082">&nbsp;</label>
			<?php echo $this->Form->hidden('082', array('id' => '082', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de edición.</td>
		<td><?php echo $this->Form->input('082i1', array('id' => '082i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Completa',
				'1' => '1 - Abreviada'
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Fuente del número de clasificación.</td>
		<td><?php echo $this->Form->input('082i2', array('id' => '082i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Asignado por la LC',
				'4' => '4 - Asignado por una agencia distinta de la LC'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Número de clasificación.</td>
		<td><?php echo $this->Form->input('082a', array('id' => '082a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Número de documento.</td>
		<td><?php echo $this->Form->input('082b', array('id' => '082b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>092</b></th>
		<th style="width: 45%;"><b>Clasificación local (COTA).</b></th>
		<th style="width: 45%;">
			<label id="l-092">&nbsp;</label>
			<?php echo $this->Form->hidden('092', array('id' => '092', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>A disposición del centro catalogador.</td>
		<td><?php echo $this->Form->input('092a', array('id' => '092a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>A disposición del centro catalogador.</td>
		<td><?php echo $this->Form->input('092b', array('id' => '092b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>A disposición del centro catalogador.</td>
		<td><?php echo $this->Form->input('092c', array('id' => '092c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>099</b></th>
		<th style="width: 45%;"><b>Número de clasificación textual libre local.</b></td>
		<th style="width: 45%;">
			<label id="l-099">&nbsp;</label>
			<?php echo $this->Form->hidden('099', array('id' => '099', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Siglas de la colección.</td>
		<td><?php echo $this->Form->input('099a', array('id' => '099a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Siglas de manuscritos.</td>
		<td><?php echo $this->Form->input('099b', array('id' => '099b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
</div>

<div id="1xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>100</b></th>
		<th style="width: 45%;"><b>Punto de acceso principal - Nombre de persona.</b></th>
		<th style="width: 45%;">
			<label id="l-100">&nbsp;</label>
			<?php echo $this->Form->hidden('100', array('id' => '100', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del nombre de persona.</td>
		<td><?php echo $this->Form->input('100i1', array('id' => '100i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre',
				'1' => '1 - Apellido (s)',
				'3' => '3 - Nombre de familia'
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('100i2', array('id' => '100i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('100a', array('id' => '100a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td><?php echo $this->Form->input('100d', array('id' => '100d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>110</b></th>
		<th style="width: 45%;"><b>Autor corporativo.</b></th>
		<th style="width: 45%;">
			<label id="l-110">&nbsp;</label>
			<?php echo $this->Form->hidden('110', array('id' => '110', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del nombre de entidad corporativa.</td>
		<td><?php echo $this->Form->input('110i1', array('id' => '110i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No definido',
				'0' => '0 - Nombre en orden inverso',
				'1' => '1 - Nombre de jurisdicción',
				'2' => '2 - Nombre en orden directo'
			), 'selected' => '2'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('110i2', array('id' => '110i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de autor corporativo.</td>
		<td><?php echo $this->Form->input('110a', array('id' => '110a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Unidad subordinada.</td>
		<td><?php echo $this->Form->input('110b', array('id' => '110b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>130</b></th>
		<th style="width: 45%;"><b>Título uniforme (Punto de acceso).</b></th>
		<th style="width: 45%;">
			<label id="l-130">&nbsp;</label>
			<?php echo $this->Form->hidden('130', array('id' => '130', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Caracteres que no alfabetizan.</td>
		<td><?php echo $this->Form->input('130i1', array('id' => '130i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',		
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('130i2', array('id' => '130i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título uniforme.</td>
		<td><?php echo $this->Form->input('130a', array('id' => '130a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de parte o sección de la obra.</td>
		<td><?php echo $this->Form->input('130n', array('id' => '130n', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de parte o sección de la obra.</td>
		<td><?php echo $this->Form->input('130p', array('id' => '130p', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
</div>

<div id="2xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>222</b></th>
		<th style="width: 45%;"><b>Título clave.</b></th>
		<th style="width: 45%;">
			<label id="l-222">&nbsp;</label>
			<?php echo $this->Form->hidden('222', array('id' => '222', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('222i1', array('id' => '222i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Caracteres que no alfabetizan.</td>
		<td><?php echo $this->Form->input('222i2', array('id' => '222i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título clave.</td>
		<td><?php echo $this->Form->input('222a', array('id' => '222a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Información adicional.</td>
		<td><?php echo $this->Form->input('222b', array('id' => '222b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>240</b></th>
		<th style="width: 45%;"><b>Título uniforme.</b></th>
		<th style="width: 45%;">
			<label id="l-240">&nbsp;</label>
			<?php echo $this->Form->hidden('240', array('id' => '240', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Impresión o visualización.</td>
		<td><?php echo $this->Form->input('240i1', array('id' => '240i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - No se imprime ni se visualiza',
				'1' => '1 - Se imprime o se visualiza'
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Caracteres que no alfabetizan.</td>
		<td><?php echo $this->Form->input('240i2', array('id' => '240i2', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',		
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título uniforme.</td>
		<td><?php echo $this->Form->input('240a', array('id' => '240a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
		<tr>
		<td><b>$m</b></td>
		<td>Mención de interpretacion musical.</td>
		<td><?php echo $this->Form->input('240m', array('id' => '240m', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de parte o sección de la obra.</td>
		<td><?php echo $this->Form->input('240n', array('id' => '240n', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$o</b></td>
		<td>Mención del arreglo musical.</td>
		<td><?php echo $this->Form->input('240o', array('id' => '240o', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de parte o sección de la obra.</td>
		<td><?php echo $this->Form->input('240p', array('id' => '240p', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$r</b></td>
		<td>Clave musical.</td>
		<td><?php echo $this->Form->input('240r', array('id' => '240r', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>245</b></th>
		<th style="width: 45%;"><b>Mención de título.</b></th>
		<th style="width: 45%;">
			<label id="l-245">&nbsp;</label>
			<?php echo $this->Form->hidden('245', array('id' => '245', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Punto de acceso adicional de título.</td>
		<td><?php echo $this->Form->input('245i1', array('id' => '245i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - No hay punto de acceso adicional',
				'1' => '1 - Hay punto de acceso adicional'
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Caracteres que no alfabetizan.</td>
		<td><?php echo $this->Form->input('245i2', array('id' => '245i2', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',		
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('245a', array('id' => '245a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Subtítulo o título paralelo.</td>
		<td><?php echo $this->Form->input('245b', array('id' => '245b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Mención de responsabilidad.</td>
		<td><?php echo $this->Form->input('245c', array('id' => '245c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Tipo de material.</td>
		<td><?php echo $this->Form->input('245h', array('id' => '245h', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>246</b></th>
		<th style="width: 45%;"><b>Variante de título.</b></th>
		<th style="width: 45%;">
			<label id="l-246">&nbsp;</label>
			<?php echo $this->Form->hidden('246', array('id' => '246', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de nota/punto de acceso adicional.</td>
		<td><?php echo $this->Form->input('246i1', array('id' => '246i1', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Nota, no hay punto de acceso adicional',
				'1' => '1 - Nota, hay punto de acceso adicional',
				'2' => '2 - Ni hay nota ni punto de acceso adicional',
				'3' => '3 - No hay nota, hay punto de acceso adicional'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de título.</td>
		<td><?php echo $this->Form->input('246i2', array('id' => '246i2', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se especifica',
				'0' => '0 - Parte de título',
				'1' => '1 - Título paralelo',
				'2' => '2 - Título distintivo',
				'3' => '3 - Otro título',
				'4' => '4 - Título de la cubierta',
				'5' => '5 - Título de la portada adicional',
				'6' => '6 - Título de la cabecera',
				'7' => '7 - “Titulillo”, título de margen',
				'8' => '8 - Título del lomo'		
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título.</td>
		<td><?php echo $this->Form->input('246a', array('id' => '246a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Subtítulo o título paralelo.</td>
		<td><?php echo $this->Form->input('246b', array('id' => '246b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$i</b></td>
		<td>Texto de visualización.</td>
		<td><?php echo $this->Form->input('246i', array('id' => '246i', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>247</b></th>
		<th style="width: 45%;"><b>Título anterior.</b></th>
		<th style="width: 45%;">
			<label id="l-247">&nbsp;</label>
			<?php echo $this->Form->hidden('247', array('id' => '247', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título.</td>
		<td><?php echo $this->Form->input('247a', array('id' => '247a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Subtítulo o título paralelo.</td>
		<td><?php echo $this->Form->input('247b', array('id' => '247b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$f</b></td>
		<td>Fecha o designación secuencial.</td>
		<td><?php echo $this->Form->input('247f', array('id' => '247f', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$g</b></td>
		<td>Nota sobre el título anterior.</td>
		<td><?php echo $this->Form->input('247g', array('id' => '247g', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de parte o sección de la obra.</td>
		<td><?php echo $this->Form->input('247n', array('id' => '247n', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de parte o sección de la obra.</td>
		<td><?php echo $this->Form->input('247p', array('id' => '247p', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>250</b></th>
		<th style="width: 45%;"><b>Mención de edición.</b></th>
		<th style="width: 45%;">
			<label id="l-250">&nbsp;</label>
			<?php echo $this->Form->hidden('250', array('id' => '250', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Mención de edición.</td>
		<td><?php echo $this->Form->input('250a', array('id' => '250a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Resto de la mención de edición.</td>
		<td><?php echo $this->Form->input('250b', array('id' => '250b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>254</b></th>
		<th style="width: 45%;"><b>Mención de edición.</b></th>
		<th style="width: 45%;">
			<label id="l-254">&nbsp;</label>
			<?php echo $this->Form->hidden('254', array('id' => '254', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Mención de edición o presentación musical.</td>
		<td><?php echo $this->Form->input('254a', array('id' => '254a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Resto de la mención de edición o presentación musical.</td>
		<td><?php echo $this->Form->input('254b', array('id' => '254b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>260</b></th>
		<th style="width: 45%;"><b>Publicación, distribución, etc. (pie de imprenta).</b></th>
		<th style="width: 45%;">
			<label id="l-260">&nbsp;</label>
			<?php echo $this->Form->hidden('260', array('id' => '260', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Lugar de publicación, distribución, etc <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('260a', array('id' => '260a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Nombre del editor, distribuidor, etc <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('260b', array('id' => '260b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Fecha de publicación, distribución, etc <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('260c', array('id' => '260c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
</div>

<div id="3xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>300</b></th>
		<th style="width: 45%;"><b>Descripción física.</b></th>
		<th style="width: 45%;">
			<label id="l-300">&nbsp;</label>
			<?php echo $this->Form->hidden('300', array('id' => '300', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Extensión.</td>
		<td><?php echo $this->Form->input('300a', array('id' => '300a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Otras características físicas.</td>
		<td><?php echo $this->Form->input('300b', array('id' => '300b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Dimensiones.</td>
		<td><?php echo $this->Form->input('300c', array('id' => '300c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Material anejo.</td>
		<td><?php echo $this->Form->input('300e', array('id' => '300e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>306</b></th>
		<th style="width: 45%;"><b>Duración.</b></th>
		<th style="width: 45%;">
			<label id="l-306">&nbsp;</label>
			<?php echo $this->Form->hidden('306', array('id' => '306', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Duración.</td>
		<td><?php echo $this->Form->input('306a', array('id' => '306a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fecha de comienzo de la periodicidad actual.</td>
		<td><?php echo $this->Form->input('306b', array('id' => '306b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>310</b></th>
		<th style="width: 45%;"><b>Periodicidad actual.</b></th>
		<th style="width: 45%;">
			<label id="l-310">&nbsp;</label>
			<?php echo $this->Form->hidden('310', array('id' => '310', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Periodicidad actual.</td>
		<td><?php echo $this->Form->input('310a', array('id' => '310a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fecha de comienzo de la periodicidad actual.</td>
		<td><?php echo $this->Form->input('310b', array('id' => '310b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>321</b></th>
		<th style="width: 45%;"><b>Periodicidad anterior.</b></th>
		<th style="width: 45%;">
			<label id="l-321">&nbsp;</label>
			<?php echo $this->Form->hidden('321', array('id' => '321', 'label' => false, 'div' => false)); ?>
		</t>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Periodicidad anterior.</td>
		<td><?php echo $this->Form->input('321a', array('id' => '321a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fechas de la periodicidad anterior.</td>
		<td><?php echo $this->Form->input('321b', array('id' => '321b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>336</b></th>
		<th style="width: 45%;"><b>Tipo de contenido.</b></th>
		<th style="width: 45%;">
			<label id="l-336">&nbsp;</label>
			<?php echo $this->Form->hidden('336', array('id' => '336', 'label' => false, 'div' => false, 'class' => 'form-control')); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Término del tipo de contenido.</font></td>
		<td><?php echo $this->Form->input('336a', array('id' => '336a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Código de tipo de contenido.</td>
		<td><?php echo $this->Form->input('336b', array('id' => '336b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>337</b></th>
		<th style="width: 45%;"><b>Tipo de medio.</b></th>
		<th style="width: 45%;">
			<label id="l-337">&nbsp;</label>
			<?php echo $this->Form->hidden('337', array('id' => '337', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre del tipo de medio.</td>
		<td><?php echo $this->Form->input('337a', array('id' => '337a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Código de tipo de medio.</td>
		<td><?php echo $this->Form->input('337b', array('id' => '337b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>340</b></th>
		<th style="width: 45%;"><b>Medio físico/Tipo de Soporte.</b></td>
		<th style="width: 45%;">
			<label id="l-340">&nbsp;</label>
			<?php echo $this->Form->hidden('340', array('id' => '340', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Base y configuración del material.</td>
		<td><?php echo $this->Form->input('340a', array('id' => '340a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Dimensiones.</td>
		<td><?php echo $this->Form->input('340b', array('id' => '340b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Materiales aplicados a la superficie.</td>
		<td><?php echo $this->Form->input('340c', array('id' => '340c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Técnica en la que se registra la información.</td>
		<td><?php echo $this->Form->input('340d', array('id' => '340d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Soporte.</td>
		<td><?php echo $this->Form->input('340e', array('id' => '340e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>


<table class="table">
	<tr>
		<th style="width: 10%;"><b>362</b></th>
		<th style="width: 45%;"><b>Fechas de publicación y/o designación secuencial.</b></th>
		<th style="width: 45%;">
			<label id="l-362">&nbsp;</label>
			<?php echo $this->Form->hidden('362', array('id' => '362', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Fechas de publicación y/o designación secuencial.</td>
		<td><?php echo $this->Form->input('362a', array('id' => '362a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>380</b></th>
		<th style="width: 45%;"><b>Forma de la obra.</b></th>
		<th style="width: 45%;">
			<label id="l-380">&nbsp;</label>
			<?php echo $this->Form->hidden('380', array('id' => '380', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Forma de la obra.</td>
		<td><?php echo $this->Form->input('380a', array('id' => '380a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>381</b></th>
		<th style="width: 45%;"><b>Otras características distintivas de obra (Compás).</b></th>
		<th style="width: 45%;">
			<label id="l-381">&nbsp;</label>
			<?php echo $this->Form->hidden('381', array('id' => '381', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nomenclatura de compás.</td>
		<td><?php echo $this->Form->input('381a', array('id' => '381a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
</div>

<div id="4xx" class="tabs" style="display: none;">

<table class="table">
	<tr>
		<th style="width: 10%;"><b>440</b></th>
		<th style="width: 45%;"><b>Mencion de serie/Asiento secundario-titulo.</b></th>
		<th style="width: 45%;">
			<label id="l-440">&nbsp;</label>
			<?php echo $this->Form->hidden('440', array('id' => '440', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título de la serie.</td>
		<td><?php echo $this->Form->input('440a', array('id' => '440a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de parte o seccion de la obra.</td>
		<td><?php echo $this->Form->input('440n', array('id' => '440n', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de parte o seccion de la obra.</td>
		<td><?php echo $this->Form->input('440p', array('id' => '440p', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Número normalizado de la serie.</td>
		<td><?php echo $this->Form->input('440x', array('id' => '440x', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Volúmen.</td>
		<td><?php echo $this->Form->input('440v', array('id' => '440v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
<table class="table">
	<tr>
		<th style="width: 1o%;"><b>490</b></th>
		<th style="width: 45%;"><b> Mención de la serie.</b></th>
		<th style="width: 45%;">
			<label id="l-490">&nbsp;</label>
			<?php echo $this->Form->hidden('490', array('id' => '490', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Política de recuperación de series.</td>
		<td><?php echo $this->Form->input('490i1', array('id' => '490i1', 'label' => false, 'div' => false,  'class' => 'form-control',
			'options' => array(
					'0' => '0 - Serie sin recuperación',
					'1' => '1 - Serie con recuperación'
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('490i2', array('id' => '490i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de la fuente.</td>
		<td><?php echo $this->Form->input('490a', array('id' => '490a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Localización dentro de la fuente.</td>
		<td><?php echo $this->Form->input('490v', array('id' => '490v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
</div>

<div id="5xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>500</b></th>
		<th style="width: 45%;"><b>Nota general.</b></th>
		<th style="width: 45%;">
			<label id="l-500">&nbsp;</label>
			<?php echo $this->Form->hidden('500', array('id' => '500', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota general.</td>
		<td><?php echo $this->Form->input('500a', array('id' => '500a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>501</b></th>
		<th style="width: 45%;"><b>Nota de “Con”.</b></th>
		<th style="width: 45%;">
			<label id="l-501">&nbsp;</label>
			<?php echo $this->Form->hidden('501', array('id' => '501', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Con.</td>
		<td><?php echo $this->Form->input('501a', array('id' => '501a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>505</b></th>
		<th style="width: 45%;"><b>Nota de contenido con formato.</b></th>
		<th style="width: 45%;">
			<label id="l-505">&nbsp;</label>
			<?php echo $this->Form->hidden('505', array('id' => '505', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('505i1', array('id' => '505i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Contenido completo',
				'1' => '1 - Contenido incompleto',
				'2' => '2 - Contenido parcial',
				'8' => '8 - No genera visualización asociada'
			), 'selected' => '2'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Nivel de designación del contenido.</td>
		<td><?php echo $this->Form->input('505i2', array('id' => '505i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - Básico',
					'0' => '0 - Completo'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de contenido con formato.</td>
		<td><?php echo $this->Form->input('505a', array('id' => '505a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título.</td>
		<td><?php echo $this->Form->input('505t', array('id' => '505t', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$r</b></td>
		<td>Autor.</td>
		<td><?php echo $this->Form->input('505r', array('id' => '505r', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>508</b></th>
		<th style="width: 45%;"><b>Nota de “Con”.</b></th>
		<th style="width: 45%;">
			<label id="l-508">&nbsp;</label>
			<?php echo $this->Form->hidden('508', array('id' => '508', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Con.</td>
		<td><?php echo $this->Form->input('508a', array('id' => '508a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>510</b></th>
		<th style="width: 45%;"><b>Nota de citas o referencias bibliográficas.</b></th>
		<th style="width: 45%;">
			<label id="l-510">&nbsp;</label>
			<?php echo $this->Form->hidden('510', array('id' => '510', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Cobertura/localización dentro de la fuente.</td>
		<td><?php echo $this->Form->input('510i1', array('id' => '510i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Cobertura desconocida',
				'1' => '1 - Cobertura completa',
				'2' => '2 - Cobertura selectiva',
				'3' => '3 - No se indica la localización dentro de la fuente',
				'4' => '4 - Se indica la localización dentro de la fuente'
			), 'selected' => '3'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('510i2', array('id' => '510i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de la fuente.</td>
		<td><?php echo $this->Form->input('510a', array('id' => '510a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Localización dentro de la fuente.</td>
		<td><?php echo $this->Form->input('510c', array('id' => '510c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>511</b></th>
		<th style="width: 45%;"><b>Nota de participantes o intérpretes.</b></th>
		<th style="width: 45%;">
			<label id="l-511">&nbsp;</label>
			<?php echo $this->Form->hidden('511', array('id' => '511', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('511i1', array('id' => '511i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - No genera visualización asociada',
				'1' => '1 - Intérpretes'
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('511i2', array('id' => '511i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de participantes o intérpretes.</font></td>
		<td><?php echo $this->Form->input('511a', array('id' => '511a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>


<table class="table">
	<tr>
		<th style="width: 10%;"><b>515</b></th>
		<th style="width: 45%;"><b>Nota de peculiaridades de la numeración.</b></th>
		<th style="width: 45%;">
			<label id="l-515">&nbsp;</label>
			<?php echo $this->Form->hidden('515', array('id' => '515', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de peculiaridades de la numeración.</td>
		<td><?php echo $this->Form->input('515a', array('id' => '515a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>520</b></th>
		<th style="width: 45%;"><b>Nota de sumario, etc.</b></th>
		<th style="width: 45%;">
			<label id="l-520">&nbsp;</label>
			<?php echo $this->Form->hidden('520', array('id' => '520', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('520i1', array('id' => '520i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - Sumario',
				'0' => '0 - Materia',
				'1' => '1 - Reseña',
				'2' => '2 - Alcance y contenido',
				'3' => '3 - Resumen',
				'4' => '4 - Aviso sobre el contenido',
				'8' => '8 - No genera visualización asociada'
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('520i2', array('id' => '520i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Sumario, etc.</td>
		<td><?php echo $this->Form->input('520a', array('id' => '520a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Otras explicaciones complementarias.</td>
		<td><?php echo $this->Form->input('520b', array('id' => '520b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
<table class="table">
	<tr>
		<th style="width: 10%;"><b>521</b></th>
		<th style="width: 45%;"><b>Nota de audiencia.</b></th>
		<th style="width: 45%;">
			<label id="l-521">&nbsp;</label>
			<?php echo $this->Form->hidden('521', array('id' => '521', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('521i1', array('id' => '521i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - Sumario',
				'0' => '0 - Materia',
				'1' => '1 - Reseña',
				'2' => '2 - Alcance y contenido',
				'3' => '3 - Resumen',
				'4' => '4 - Aviso sobre el contenido',
				'8' => '8 - No genera visualización asociada'
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>No definido.</td>
		<td><?php echo $this->Form->input('521i2', array('id' => '521i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
					'#' => '# - No definido'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de audiencia.</td>
		<td><?php echo $this->Form->input('521a', array('id' => '521a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>530</b></th>
		<th style="width: 45%;"><b>Nota de formato físico adicional disponible.</b></th>
		<th style="width: 45%;">
			<label id="l-530">&nbsp;</label>
			<?php echo $this->Form->hidden('530', array('id' => '530', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de formato físico adicional disponible.</td>
		<td><?php echo $this->Form->input('530a', array('id' => '530a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Condiciones de adquisición.</td>
		<td><?php echo $this->Form->input('530c', array('id' => '530c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Dirección electrónica.</td>
		<td><?php echo $this->Form->input('530u', array('id' => '530u', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>534</b></th>
		<th style="width: 45%;"><b>Nota sobre la versión original.</b></th>
		<th style="width: 45%;">
			<label id="l-534">&nbsp;</label>
			<?php echo $this->Form->hidden('534', array('id' => '534', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Autor.</td>
		<td><?php echo $this->Form->input('534a', array('id' => '534a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Publicación, distribución, etc. del original.</td>
		<td><?php echo $this->Form->input('534c', array('id' => '534c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$l</b></td>
		<td>Localización del original.</td>
		<td><?php echo $this->Form->input('534l', array('id' => '534l', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Frase introductoria.</td>
		<td><?php echo $this->Form->input('534p', array('id' => '534p', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>546</b></th>
		<th style="width: 45%;"><b>Nota de lengua.</b></th>
		<th style="width: 45%;">
			<label id="l-546">&nbsp;</label>
			<?php echo $this->Form->hidden('546', array('id' => '546', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de lengua.</td>
		<td><?php echo $this->Form->input('546a', array('id' => '546a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Información sobre el código o alfabeto.</td>
		<td><?php echo $this->Form->input('546c', array('id' => '546c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>555</b></th>
		<th style="width: 45%;"><b>Nota de índice acumulativo u otros instrumentos bibliográficos.</b></th>
		<th style="width: 45%;">
			<label id="l-555">&nbsp;</label>
			<?php echo $this->Form->hidden('555', array('id' => '555', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de índice acumulativo u otros instrumentos bibliográficos.</td>
		<td><?php echo $this->Form->input('555a', array('id' => '555a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Fuente de la adquisición.</td>
		<td><?php echo $this->Form->input('555b', array('id' => '555b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Referencia bibliográfica.</td>
		<td><?php echo $this->Form->input('555d', array('id' => '555d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Dirección electrónica.</td>
		<td><?php echo $this->Form->input('555u', array('id' => '555u', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>588</b></th>
		<th style="width: 45%;"><b>Nota de fuente de la descripción.</b></th>
		<th style="width: 45%;">
			<label id="l-588">&nbsp;</label>
			<?php echo $this->Form->hidden('588', array('id' => '588', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota de fuente de la descripción.</td>
		<td><?php echo $this->Form->input('588a', array('id' => '588a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
<table class="table">
	<tr>
		<th style="width: 5%;"><b>590</b></th>
		<th style="width: 60%;"><b>Nota local.</b></th>
		<th style="width: 35%;">
			<label id="l-590">&nbsp;</label>
			<?php echo $this->Form->hidden('590', array('id' => '590', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nota local.</td>
		<td><?php echo $this->Form->input('590a', array('id' => '590a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
<table class="table">
	<tr>
		<th style="width: 5%;"><b>592/2</b></th>
		<th style="width: 45%;"><b>Notas al íncipit musical.</b></th>
		<th style="width: 45%;">
			<label id="l-5922">&nbsp;</label>
			<?php echo $this->Form->hidden('5922', array('id' => '5922', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Instrumento - Medio sonoro  <font color="red">(Obligatorio).</font>.</td>
		<td><?php echo $this->Form->input('5922b', array('id' => '5922b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Género-Tempo  <font color="red">(Obligatorio).</td>
		<td><?php echo $this->Form->input('5922c', array('id' => '5922c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$f</b></td>
		<td>Armadura de clave-Tonalidad   <font color="red">(Obligatorio).</td>
		<td><?php echo $this->Form->input('5922f', array('id' => '5922f', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$g</b></td>
		<td>Compás.</td>
		<td><?php echo $this->Form->input('5922g', array('id' => '5922g', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>


</div>

<div id="6xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>600</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia - Nombre de persona.</b></th>
		<th style="width: 45%;">
			<label id="l-600">&nbsp;</label>
			<?php echo $this->Form->hidden('600', array('id' => '600', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Elemento inicial del nombre de persona.</td>
		<td><?php echo $this->Form->input('600i1', array('id' => '600i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No definido',
				'0' => '0 – Nombre',
				'1' => '1 - Apellido(s)',
				'3' => '3 - Nombre de familia'
			), 'selected' => '#'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tesauro.</td>
		<td><?php echo $this->Form->input('600i2', array('id' => '600i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Encabezamientos de Materia de la Library of Congress',
				'1' => '1 - Encabezamientos de Materia de LC para literatura infantil',
				'2' => '2 - Encabezamientos de Materia de Medicina',
				'3' => '3 - Fichero de autoridades de materia de la National Agricultural Library',
				'4' => '4 - Fuente no especificada',
				'5' => '5 - Encabezamientos de Materia de Canadá',
				'6' => '6 - Répertoire de vedettes-matière',
				'7' => '7 - Fuente especificada en el subcampo $2'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona.</td>
		<td><?php echo $this->Form->input('600a', array('id' => '600a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td><?php echo $this->Form->input('600d', array('id' => '600d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Títulos y otros términos asociados al nombre.</td>
		<td><?php echo $this->Form->input('600c', array('id' => '600c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Término indicativo de función.</td>
		<td><?php echo $this->Form->input('600e', array('id' => '600e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td><?php echo $this->Form->input('600v', array('id' => '600v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td><?php echo $this->Form->input('600x', array('id' => '600x', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td><?php echo $this->Form->input('600y', array('id' => '600y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td><?php echo $this->Form->input('600z', array('id' => '600z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>610</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia - Nombre de entidad corporativa.</b></th>
		<th style="width: 45%;">
			<label id="l-610">&nbsp;</label>
			<?php echo $this->Form->hidden('610', array('id' => '610', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del nombre de entidad corporativa.</td>
		<td><?php echo $this->Form->input('610i1', array('id' => '610i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre en orden inverso',
				'1' => '1 - Nombre de jurisdicción',
				'2' => '2 - Nombre en orden directo'
			), 'selected' => '2'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tesauro.</td>
		<td><?php echo $this->Form->input('610i2', array('id' => '610i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Encabezamientos de Materia de la Library of Congress',
				'1' => '1 - Encabezamientos de Materia de LC para literatura infantil',
				'2' => '2 - Encabezamientos de Materia de Medicina',
				'3' => '3 - Fichero de autoridades de materia de la National Agricultural Library',
				'4' => '4 - Fuente no especificada',
				'5' => '5 - Encabezamientos de Materia de Canadá',
				'6' => '6 - Répertoire de vedettes-matière',
				'7' => '7 - Fuente especificada en el subcampo $2'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de entidad corporativa.</td>
		<td><?php echo $this->Form->input('610a', array('id' => '610a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Unidad subordinada.</td>
		<td><?php echo $this->Form->input('610b', array('id' => '610b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Término indicativo de función.</td>
		<td><?php echo $this->Form->input('610e', array('id' => '610e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td><?php echo $this->Form->input('610v', array('id' => '610v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td><?php echo $this->Form->input('610x', array('id' => '610x', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td><?php echo $this->Form->input('610y', array('id' => '610y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td><?php echo $this->Form->input('610z', array('id' => '610z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>650</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia – Término de materia.</b></th>
		<th style="width: 45%;">
			<label id="l-650">&nbsp;</label>
			<?php echo $this->Form->hidden('650', array('id' => '650', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Nivel de materia.</td>
		<td><?php echo $this->Form->input('650i1', array('id' => '650i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - No se especifica',
				'1' => '1 - Principal',
				'2' => '2 - Secundaria'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tesauro.</td>
		<td><?php echo $this->Form->input('650i2', array('id' => '650i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Encabezamientos de Materia de la Library of Congress',
				'1' => '1 - Encabezamientos de Materia de LC para literatura infantil',
				'2' => '2 - Encabezamientos de Materia de Medicina',
				'3' => '3 - Fichero de autoridades de materia de la National Agricultural Library',
				'4' => '4 - Fuente no especificada',
				'5' => '5 - Encabezamientos de Materia de Canadá',
				'6' => '6 - Répertoire de vedettes-matière',
				'7' => '7 - Fuente especificada en el subcampo $2'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Materia.</td>
		<td><?php echo $this->Form->input('650a', array('id' => '650a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td><?php echo $this->Form->input('650v', array('id' => '650v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td><?php echo $this->Form->input('650x', array('id' => '650x', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td><?php echo $this->Form->input('650y', array('id' => '650y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td><?php echo $this->Form->input('650z', array('id' => '650z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>651</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional de materia - Nombre geográfico.</b></th>
		<th style="width: 45%;">
			<label id="l-651">&nbsp;</label>
			<?php echo $this->Form->hidden('651', array('id' => '651', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Nivel de materia.</td>
		<td><?php echo $this->Form->input('651i1', array('id' => '651i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - No se especifica',
				'1' => '1 - Principal',
				'2' => '2 - Secundaria'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tesauro.</td>
		<td><?php echo $this->Form->input('651i2', array('id' => '651i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - Encabezamientos de Materia de la Library of Congress',
				'1' => '1 - Encabezamientos de Materia de LC para literatura infantil',
				'2' => '2 - Encabezamientos de Materia de Medicina',
				'3' => '3 - Fichero de autoridades de materia de la National Agricultural Library',
				'4' => '4 - Fuente no especificada',
				'5' => '5 - Encabezamientos de Materia de Canadá',
				'6' => '6 - Répertoire de vedettes-matière',
				'7' => '7 - Fuente especificada en el subcampo $2'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Materia.</td>
		<td><?php echo $this->Form->input('651a', array('id' => '651a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$v</b></td>
		<td>Subdivisión de forma.</td>
		<td><?php echo $this->Form->input('651v', array('id' => '651v', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$x</b></td>
		<td>Subdivisión de materia general.</td>
		<td><?php echo $this->Form->input('651x', array('id' => '651x', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$y</b></td>
		<td>Subdivisión cronológica.</td>
		<td><?php echo $this->Form->input('651y', array('id' => '651y', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Subdivisión geográfica.</td>
		<td><?php echo $this->Form->input('651z', array('id' => '651z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>653</b></th>
		<th style="width: 45%;"><b>Término de indización – No controlado.</b></th>
		<th style="width: 45%;">
			<label id="l-653">&nbsp;</label>
			<?php echo $this->Form->hidden('653', array('id' => '653', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Nivel del término de indización.</td>
		<td><?php echo $this->Form->input('653i1', array('id' => '653i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - No se especifica',
				'1' => '1 - Principal',
				'2' => '2 - Secundaria'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de término o nombre.</td>
		<td><?php echo $this->Form->input('653i2', array('id' => '653i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Término de materia',
				'1' => '1 - Nombre de persona',
				'2' => '2 - Nombre de entidad',
				'3' => '3 - Nombre de congreso',
				'4' => '4 - Término cronológico',
				'5' => '5 - Nombre geográfico',
				'6' => '6 - Término de género/forma'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Palabra clave <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('653a', array('id' => '653a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>690</b></th>
		<th style="width: 45%;"><b>Siglo.</b></th>
		<th style="width: 45%;">
			<label id="l-690">&nbsp;</label>
			<?php echo $this->Form->hidden('690', array('id' => '690', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Siglo.</font>.</td>
		<td><?php echo $this->Form->input('690a', array('id' => '690a', 'label' => false, 'div' => false, 'class' => 'form-control', 'empty' => 'Seleccione', 'options' => array('XVII' => 'XVII', 'XVIII' => 'XVIII', 'XIX' => 'XIX', 'XX' => 'XX'))); ?></td>
	</tr>
</table>
</div>

<div id="7xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>700</b></th>
		<th style="width: 45%;"><b>Menciones de Responsabilidad.</b></th>
		<th style="width: 45%;">
			<label id="l-700">&nbsp;</label>
			<?php echo $this->Form->hidden('700', array('id' => '700', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del nombre de persona.</td>
		<td><?php echo $this->Form->input('700i1', array('id' => '700i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre',
				'1' => '1 - Apellido(s)',
				'3' => '3 - Nombre de familia'
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de punto de acceso adicional.</td>
		<td><?php echo $this->Form->input('700i2', array('id' => '700i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'2' => '2 - Entrada analítica'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona <font color="red">(Obligatorio)</font>.</td>
		<td><?php echo $this->Form->input('700a', array('id' => '700a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Numeración.</td>
		<td><?php echo $this->Form->input('700b', array('id' => '700b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Títulos y otros términos asociados al nombre.</td>
		<td><?php echo $this->Form->input('700c', array('id' => '700c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Fechas asociadas al nombre.</td>
		<td><?php echo $this->Form->input('700d', array('id' => '700d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Término indicativo de función.</td>
		<td><?php echo $this->Form->input('700e', array('id' => '700e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$q</b></td>
		<td>Forma desarrollada del nombre.</td>
		<td><?php echo $this->Form->input('700q', array('id' => '700q', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título de la obra.</td>
		<td><?php echo $this->Form->input('700t', array('id' => '700t', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$4</b></td>
		<td>Código de función.</td>
		<td><?php echo $this->Form->input('7004', array('id' => '7004', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>710</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional - Nombre corporativo.</b></th>
		<th style="width: 45%;">
			<label id="l-710">&nbsp;</label>
			<?php echo $this->Form->hidden('710', array('id' => '710', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Tipo de elemento inicial del nombre de persona.</td>
		<td><?php echo $this->Form->input('710i1', array('id' => '710i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Nombre en orden inverso',
				'1' => '1 – Nombre de jurisdicción',
				'3' => '3 - Nombre en orden directo'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de punto de acceso adicional.</td>
		<td><?php echo $this->Form->input('710i2', array('id' => '710i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'2' => '2 - Entrada analítica'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de persona.</td>
		<td><?php echo $this->Form->input('710a', array('id' => '710a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Numeración.</td>
		<td><?php echo $this->Form->input('710b', array('id' => '710b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$e</b></td>
		<td>Forma desarrollada del nombre.</td>
		<td><?php echo $this->Form->input('710e', array('id' => '710e', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título de la obra.</td>
		<td><?php echo $this->Form->input('710t', array('id' => '710t', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$4</b></td>
		<td>Código de función.</td>
		<td><?php echo $this->Form->input('7104', array('id' => '7104', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>740</b></th>
		<th style="width: 45%;"><b>Punto de acceso adicional - Título relacionado o analítico no controlado.</b></th>
		<th style="width: 45%;">
			<label id="l-740">&nbsp;</label>
			<?php echo $this->Form->hidden('740', array('id' => '740', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Caracteres que no alfabetizan.</td>
		<td><?php echo $this->Form->input('740i1', array('id' => '740i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',		
			), 'selected' => '0'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Tipo de asiento secundario.</td>
		<td><?php echo $this->Form->input('740i2', array('id' => '740i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'0' => '0 - No hay punto de acceso adicional',
				'1' => '1 - Hay punto de acceso adicional'
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Título relacionado o analítico no controlado.</td>
		<td><?php echo $this->Form->input('740a', array('id' => '740a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Número de la parte o sección de una obra.</td>
		<td><?php echo $this->Form->input('740n', array('id' => '740n', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$p</b></td>
		<td>Nombre de la parte/sección de una obra.</td>
		<td><?php echo $this->Form->input('740p', array('id' => '740p', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>773</b></th>
		<th style="width: 45%;"><b>Enlace al documento fuente.</b></th>
		<th style="width: 45%;">
			<label id="l-773">&nbsp;</label>
			<?php echo $this->Form->hidden('773', array('id' => '773', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Control de nota.</td>
		<td><?php echo $this->Form->input('773i1', array('id' => '773i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'0' => '0 - Genera nota',
				'1' => '1 - No genera nota'
			), 'selected' => '1'
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Control de visualización asociada.</td>
		<td><?php echo $this->Form->input('773i2', array('id' => '773i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - En',
				'8' => '8 - No genera visualización asociada'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Autor.</td>
		<td><?php echo $this->Form->input('773a', array('id' => '773a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Edición.</td>
		<td><?php echo $this->Form->input('773b', array('id' => '773b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Lugar, editor y fecha de publicación.</td>
		<td><?php echo $this->Form->input('773d', array('id' => '773d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$g</b></td>
		<td>Parte(s) relacionada(s).</td>
		<td><?php echo $this->Form->input('773g', array('id' => '773g', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Descripción física.</td>
		<td><?php echo $this->Form->input('773h', array('id' => '773h', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$k</b></td>
		<td>Datos de la serie del documento relacionado.</td>
		<td><?php echo $this->Form->input('773k', array('id' => '773k', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$n</b></td>
		<td>Nota.</td>
		<td><?php echo $this->Form->input('773n', array('id' => '773n', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$q</b></td>
		<td>Numeración y primera página.</td>
		<td><?php echo $this->Form->input('773q', array('id' => '773q', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$t</b></td>
		<td>Título.</td>
		<td><?php echo $this->Form->input('773t', array('id' => '773t', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$z</b></td>
		<td>Número Internacional Normalizado para Libros (ISBN).</td>
		<td><?php echo $this->Form->input('773z', array('id' => '773z', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>
</div>

<div id="8xx" class="tabs" style="display: none;">
<table class="table">
	<tr>
		<th style="width: 10%;"><b>850</b></th>
		<th style="width: 45%;"><b>Institución que posee los fondos.</b></th>
		<th style="width: 45%;">
			<label id="l-850">&nbsp;</label>
			<?php echo $this->Form->hidden('850', array('id' => '850', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre de la institución que posee los fondos.</td>
		<td><?php echo $this->Form->input('850a', array('id' => '850a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>852</b></th>
		<th style="width: 45%;"><b>Localización.</b></th>
		<th style="width: 45%;">
			<label id="l-852">&nbsp;</label>
			<?php echo $this->Form->hidden('852', array('id' => '852', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Sistema de colocación.</td>
		<td><?php echo $this->Form->input('852i1', array('id' => '852i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Clasificación de la Biblioteca del Congreso',
				'1' => '1 - Clasificación Decimal Dewey',
				'2' => '2 - Clasificación de la National Library of Medicine',
				'3' => '3 - Clasificación del Superintendent of Documents',
				'4' => '4 - Por número de control en estantería',
				'5' => '5 - Por título',
				'6' => '6 - Colocación dispersa',
				'7' => '7 - Fuente especificada en el subcampo $2',
				'8' => '8 - Otro sistema'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Orden de colocación.</td>
		<td><?php echo $this->Form->input('852i2', array('id' => '852i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Sin numeración',
				'1' => '1 - Por numeración principal',
				'2' => '2 - Por numeración alternativa'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Localización.</td>
		<td><?php echo $this->Form->input('852a', array('id' => '852a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$b</b></td>
		<td>Sublocalización o colección.</td>
		<td><?php echo $this->Form->input('852b', array('id' => '852b', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$c</b></td>
		<td>Ubicación en estantería.</td>
		<td><?php echo $this->Form->input('852c', array('id' => '852c', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$h</b></td>
		<td>Parte de la signatura que corresponde a la clasificación.</td>
		<td><?php echo $this->Form->input('852h', array('id' => '852h', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$i</b></td>
		<td>Parte de la signatura que identifica al ejemplar.</td>
		<td><?php echo $this->Form->input('852i', array('id' => '852i', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$j</b></td>
		<td>Número de control en estantería.</td>
		<td><?php echo $this->Form->input('852j', array('id' => '852j', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$k</b></td>
		<td>Prefijo de la signatura.</td>
		<td><?php echo $this->Form->input('852k', array('id' => '852k', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$m</b></td>
		<td>Sufijo de la signatura.</td>
		<td><?php echo $this->Form->input('852m', array('id' => '852m', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

<table class="table">
	<tr>
		<th style="width: 10%;"><b>856</b></th>
		<th style="width: 45%;"><b>Localización y acceso electrónicos.</b></th>
		<th style="width: 45%;">
			<label id="l-856">&nbsp;</label>
			<?php echo $this->Form->hidden('856', array('id' => '856', 'label' => false, 'div' => false)); ?>
		</th>
	</tr>
	<tr>
		<td><b>I1</b></td>
		<td>Método de acceso.</td>
		<td><?php echo $this->Form->input('856i1', array('id' => '856i1', 'label' => false, 'div' => false, 'class' => 'form-control', 
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Correo electrónico',
				'1' => '1 - FTP',
				'2' => '2 - Conexión remota (Telnet)',
				'3' => '3 - Llamada telefónica',
				'4' => '4 – HTTP',
				'7' => '7 - Método especificado en el subcampo $2'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>I2</b></td>
		<td>Relación.</td>
		<td><?php echo $this->Form->input('856i2', array('id' => '856i2', 'label' => false, 'div' => false, 'class' => 'form-control',
			'options' => array(
				'#' => '# - No se proporciona información',
				'0' => '0 - Recurso',
				'1' => '1 - Versión del recurso',
				'2' => '2 - Recurso relacionado',
				'8' => '8 - No hay visualización asociada'
			)
		)); ?></td>
	</tr>
	<tr>
		<td><b>$a</b></td>
		<td>Nombre del host.</td>
		<td><?php echo $this->Form->input('856a', array('id' => '856a', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$d</b></td>
		<td>Ruta.</td>
		<td><?php echo $this->Form->input('856d', array('id' => '856d', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
	<tr>
		<td><b>$u</b></td>
		<td>Dirección electrónica.</td>
		<td><?php echo $this->Form->input('856u', array('id' => '856u', 'label' => false, 'div' => false, 'class' => 'form-control')); ?></td>
	</tr>
</table>

</div>

<?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Auth.User.id'))); ?>
	
	<table class="table">
		<tr>
			<th style="width: 50%;">Portada de la obra (preferiblemente jpg o gif).</th>
			<th style="width: 50%;">Archivo o Documento (preferiblemente pdf o doc). (Obligatorio).</th>
		</tr>
		<tr>
			<td><?php echo $this->Form->input('cover', array('label' => false, 'type' => 'file', 'style' => 'width: 100%')); ?></td>
			<td><?php echo $this->Form->input('item', array('label' => false, 'type' => 'file', 'style' => 'width: 100%')); ?></td>
		</tr>
	</table>
	
	<input type="checkbox" id="ManuscriptPublished" value="1" checked="checked" name="data[Manuscript][published]" style="width: 30px;">Publicado

	<div style="text-align: right;"><a href="#top" class="btn btn-primary">Ir Arriba</a></div>
	
	<br />
	
	<div class="text-center">
		<?php echo $this->Form->submit('Guardar', array('id' => 'guardar', 'class' => 'btn btn-primary')); ?>
	</div>
	
<?php echo $this->Form->end();?>
</div>
</div>

<div style="clear: both;"><br /><br /></div>

<script type="text/javascript">
$(document).ready(function() {

	//-------------- Pestañas ---------------

	$(".tab").click(function(event) {
		var id = $(this).attr('id');

		if (id.localeCompare("t9xx")) {
			$(".tabs").hide();
			$('.active').removeClass('active');
			$(this).parent().addClass('active');
		}

		if (id == "t0xx"){ $('#0xx').show(); }
		if (id == "t1xx"){ $('#1xx').show(); }
		if (id == "t2xx"){ $('#2xx').show(); }
		if (id == "t3xx"){ $('#3xx').show(); }
		if (id == "t4xx"){ $('#4xx').show(); }
		if (id == "t5xx"){ $('#5xx').show(); }
		if (id == "t6xx"){ $('#6xx').show(); }
		if (id == "t7xx"){ $('#7xx').show(); }
		if (id == "t8xx"){ $('#8xx').show(); }
		//if (id == "t9xx"){ $('#9xx').show(); }

		return false;
	});
	
	//-------------- Validaciones ---------------
	
	/*
	$("#tipo").change(function(event) {
		var valor = $(this).val();

		$("#BookH-005 option[value=n]").attr("selected", true);
		$("#BookH-017 option[value=7]").attr("selected", true);
		$("#BookH-018 option[value=a]").attr("selected", true);
		
		switch (valor){
			case '1': 	$("#BookH-006 option[value=a]").attr("selected", true);
						$("#BookH-007 option[value=m]").attr("selected", true);
						break;
						
			case '2': 	$("#BookH-006 option[value=a]").attr("selected", true);
						$("#BookH-007 option[value=s]").attr("selected", true);
						break;
						
			case '3': 	$("#BookH-006 option[value=a]").attr("selected", true);
						$("#BookH-007 option[value=a]").attr("selected", true);
						break;
						
			case '4': 	$("#BookH-006 option[value=a]").attr("selected", true);
						$("#BookH-007 option[value=b]").attr("selected", true);
						break;
						
			case '5': 	$("#BookH-006 option[value=c]").attr("selected", true);
						$("#BookH-007 option[value=m]").attr("selected", true);
						break;
						
			case '6': 	$("#BookH-006 option[value=d]").attr("selected", true);
						$("#BookH-007 option[value=m]").attr("selected", true);
						break;
						
			case '7': 	$("#BookH-006 option[value=c]").attr("selected", true);
						$("#BookH-007 option[value=a]").attr("selected", true);
						break;
						
			case '8': 	$("#BookH-006 option[value=d]").attr("selected", true);
						$("#BookH-007 option[value=a]").attr("selected", true);
						break;
						
			case '9': 	$("#BookH-006 option[value=c]").attr("selected", true);
						$("#BookH-007 option[value=b]").attr("selected", true);
						break;
			
			case '10': 	$("#BookH-006 option[value=c]").attr("selected", true);
						$("#BookH-007 option[value=c]").attr("selected", true);
						break;
			
			case '11': 	$("#BookH-006 option[value=d]").attr("selected", true);
						$("#BookH-007 option[value=c]").attr("selected", true);
						break;
						
			case '12': 	$("#BookH-006 option[value=k]").attr("selected", true);
						$("#BookH-007 option[value=m]").attr("selected", true);
						break;
						
			case '13': 	$("#BookH-006 option[value=k]").attr("selected", true);
						$("#BookH-007 option[value=a]").attr("selected", true);
						break;
						
			case '14': 	$("#BookH-006 option[value=k]").attr("selected", true);
						$("#BookH-007 option[value=b]").attr("selected", true);
						break;
		}
	});*/
		
	$("#008-07-10").change(function(event) {
		if($("#008-07-10 option:selected").val() != 'pf'){
			$("#fecha008-07-10").prop('disabled', true);
			$("#fecha008-07-10").val('yymmdd');
		} else {
			$("#fecha008-07-10").prop('disabled', false);
		}
	});
	
	$("#008-11-14").change(function(event) {
		if($("#008-11-14 option:selected").val() != 'sf'){
			$("#fecha008-11-14").prop('disabled', true);
			$("#fecha008-11-14").val('yymmdd');
		} else {
			$("#fecha008-11-14").prop('disabled', false);
		}
	});

	// El campo 008 al cargar la pagina.
	var tmp_008 = "";

	if ($('#008-06').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-06').val();
	}

	if ($('#008-07-10').val().length > 0) {
		if($("#008-07-10 option:selected").val() != 'pf'){
			tmp_008 = tmp_008 + $('#008-07-10').val();
		} else {
			tmp_008 = tmp_008 + $('#fecha008-07-10').val();
		}
	}

	if ($('#008-11-14').val().length > 0) {
		if($("#008-11-14 option:selected").val() != 'sf'){
			tmp_008 = tmp_008 + $('#008-11-14').val();
		} else {
			tmp_008 = tmp_008 + $('#fecha008-11-14').val();
		}
	}

	if ($('#008-15-17').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-15-17').val();
	}

	if ($('#008-18').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-18').val();
	}

	if ($('#008-19').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-19').val();
	}

	if ($('#008-20').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-20').val();
	}

	if ($('#008-21').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-21').val();
	}

	if ($('#008-35-37').val().length > 0) {
		tmp_008 = tmp_008 + $('#008-35-37').val();
	}
	
	if (tmp_008.length > 0) {
		$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
		$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
	} else {
		$("#008").val('');
		$("#l-008").html('&nbsp;');
	}
	
	$("#008-06").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-07-10").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#fecha008-07-10").bind('keyup change', function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-11-14").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#fecha008-11-14").bind('keyup change', function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});
	
	$("#008-15-17").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-18").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-19").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-20").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-21").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});

	$("#008-35-37").change(function(event) {
		var tmp_008 = "";

		if ($('#008-06').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-06').val();
		}

		if ($('#008-07-10').val().length > 0) {
			if($("#008-07-10 option:selected").val() != 'pf'){
				tmp_008 = tmp_008 + $('#008-07-10').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-07-10').val();
			}
		}

		if ($('#008-11-14').val().length > 0) {
			if($("#008-11-14 option:selected").val() != 'sf'){
				tmp_008 = tmp_008 + $('#008-11-14').val();
			} else {
				tmp_008 = tmp_008 + $('#fecha008-11-14').val();
			}
		}

		if ($('#008-15-17').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-15-17').val();
		}

		if ($('#008-18').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-18').val();
		}

		if ($('#008-19').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-19').val();
		}

		if ($('#008-20').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-20').val();
		}

		if ($('#008-21').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-21').val();
		}

		if ($('#008-35-37').val().length > 0) {
			tmp_008 = tmp_008 + $('#008-35-37').val();
		}
		
		if (tmp_008.length > 0) {
			$("#008").val('<?php echo date('ymd', time()); ?>' + tmp_008);
			$("#l-008").html('<?php echo date('ymd', time()); ?>' + tmp_008);
		} else {
			$("#008").val('');
			$("#l-008").html('&nbsp;');
		}
	});
	
	$("#017a").bind('keyup change', function(event) {
		if ($('#017a').val().length > 0) {
			$("#017").val('##' + '^a' + $('#017a').val());
			$("#l-017").html('##' + '^a' + $('#017a').val());
		} else {
			$("#017").val('');
			$("#l-017").html('&nbsp;');
		}
	});

	$("#020a").bind('keyup change', function(event) {
		var tmp_020 = "";

		if ($('#020a').val().length > 0) {
			tmp_020 = tmp_020 + '^a' + $('#020a').val();
		}

		if ($('#020c').val().length > 0) {
			tmp_020 = tmp_020 + '^c' + $('#020c').val();
		}
		
		if ($('#020z').val().length > 0) {
			tmp_020 = tmp_020 + '^z' + $('#020z').val();
		}

		if (tmp_020.length > 0) {
			$("#020").val('##' + tmp_020);
			$("#l-020").html('##' + tmp_020);
		} else {
			$("#020").val('');
			$("#l-020").html('&nbsp;');
		}
	});

	$("#020c").bind('keyup change', function(event) {
		var tmp_020 = "";

		if ($('#020a').val().length > 0) {
			tmp_020 = tmp_020 + '^a' + $('#020a').val();
		}

		if ($('#020c').val().length > 0) {
			tmp_020 = tmp_020 + '^c' + $('#020c').val();
		}
		
		if ($('#020z').val().length > 0) {
			tmp_020 = tmp_020 + '^z' + $('#020z').val();
		}

		if (tmp_020.length > 0) {
			$("#020").val('##' + tmp_020);
			$("#l-020").html('##' + tmp_020);
		} else {
			$("#020").val('');
			$("#l-020").html('&nbsp;');
		}
	});

	$("#020z").bind('keyup change', function(event) {
		var tmp_020 = "";

		if ($('#020a').val().length > 0) {
			tmp_020 = tmp_020 + '^a' + $('#020a').val();
		}

		if ($('#020c').val().length > 0) {
			tmp_020 = tmp_020 + '^c' + $('#020c').val();
		}
		
		if ($('#020z').val().length > 0) {
			tmp_020 = tmp_020 + '^z' + $('#020z').val();
		}

		if (tmp_020.length > 0) {
			$("#020").val('##' + tmp_020);
			$("#l-020").html('##' + tmp_020);
		} else {
			$("#020").val('');
			$("#l-020").html('&nbsp;');
		}
	});
	
	$("#022a").bind('keyup change', function(event) {
		var tmp_022 = "";

		if ($('#022a').val().length > 0) {
			tmp_022 = tmp_022 + '^a' + $('#022a').val();
		}

		if ($('#022y').val().length > 0) {
			tmp_022 = tmp_022 + '^y' + $('#022y').val();
		}
		
		if ($('#022z').val().length > 0) {
			tmp_022 = tmp_022 + '^z' + $('#022z').val();
		}

		if (tmp_022.length > 0) {
			$("#022").val('##' + tmp_022);
			$("#l-022").html('##' + tmp_022);
		} else {
			$("#022").val('');
			$("#l-022").html('&nbsp;');
		}
	});

	$("#022y").bind('keyup change', function(event) {
		var tmp_022 = "";

		if ($('#022a').val().length > 0) {
			tmp_022 = tmp_022 + '^a' + $('#022a').val();
		}

		if ($('#022y').val().length > 0) {
			tmp_022 = tmp_022 + '^y' + $('#022y').val();
		}
		
		if ($('#022z').val().length > 0) {
			tmp_022 = tmp_022 + '^z' + $('#022z').val();
		}

		if (tmp_022.length > 0) {
			$("#022").val('##' + tmp_022);
			$("#l-022").html('##' + tmp_022);
		} else {
			$("#022").val('');
			$("#l-022").html('&nbsp;');
		}
	});

	$("#022z").bind('keyup change', function(event) {
		var tmp_022 = "";

		if ($('#022a').val().length > 0) {
			tmp_022 = tmp_022 + '^a' + $('#022a').val();
		}

		if ($('#022y').val().length > 0) {
			tmp_022 = tmp_022 + '^y' + $('#022y').val();
		}
		
		if ($('#022z').val().length > 0) {
			tmp_022 = tmp_022 + '^z' + $('#022z').val();
		}

		if (tmp_022.length > 0) {
			$("#022").val('##' + tmp_022);
			$("#l-022").html('##' + tmp_022);
		} else {
			$("#022").val('');
			$("#l-022").html('&nbsp;');
		}
	});
	
	$("#024a").bind('keyup change', function(event) {
		var tmp_024 = "";

		if ($('#024a').val().length > 0) {
			tmp_024 = tmp_024 + '^a' + $('#024a').val();
		}

		if ($('#024y').val().length > 0) {
			tmp_024 = tmp_024 + '^y' + $('#024y').val();
		}
		
		if (tmp_024.length > 0) {
			$("#024").val($("#024i1").val() + $("#024i2").val() + tmp_024);
			$("#l-024").html($("#024i1").val() + $("#024i2").val() + tmp_024);
		} else {
			$("#024").val('');
			$("#l-024").html('&nbsp;');
		}
	});
	
	$("#024y").bind('keyup change', function(event) {
		var tmp_024 = "";

		if ($('#024a').val().length > 0) {
			tmp_024 = tmp_024 + '^a' + $('#024a').val();
		}

		if ($('#024y').val().length > 0) {
			tmp_024 = tmp_024 + '^y' + $('#024y').val();
		}
		
		if (tmp_024.length > 0) {
			$("#024").val($("#024i1").val() + $("#024i2").val() + tmp_024);
			$("#l-024").html($("#024i1").val() + $("#024i2").val() + tmp_024);
		} else {
			$("#024").val('');
			$("#l-024").html('&nbsp;');
		}
	});

	$("#028a").bind('keyup change', function(event) {
		var tmp_028 = "";

		if ($('#028a').val().length > 0) {
			tmp_028 = tmp_028 + '^a' + $('#028a').val();
		}

		if ($('#028b').val().length > 0) {
			tmp_028 = tmp_028 + '^b' + $('#028b').val();
		}

		if (tmp_028.length > 0) {
			$("#028").val('20' + tmp_028);
			$("#l-028").html('20' + tmp_028);
		} else {
			$("#028").val('');
			$("#l-028").html('&nbsp;');
		}
	});

	$("#028b").bind('keyup change', function(event) {
		var tmp_028 = "";

		if ($('#028a').val().length > 0) {
			tmp_028 = tmp_028 + '^a' + $('#028a').val();
		}

		if ($('#028b').val().length > 0) {
			tmp_028 = tmp_028 + '^b' + $('#028b').val();
		}

		if (tmp_028.length > 0) {
			$("#028").val('20' + tmp_028);
			$("#l-028").html('20' + tmp_028);
		} else {
			$("#028").val('');
			$("#l-028").html('&nbsp;');
			
		}		
	});
	
	$("#031a").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
	
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
			if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});

	$("#031b").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
		$("#031c").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
				if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
		if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031d").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
		if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
			if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});	
	
	$("#031e").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}
		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031f").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}
			if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});

	
	$("#031g").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
			if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031m").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
			if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
			if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031n").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
		
		if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031o").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
		
		if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031p").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
		
		if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});

	$("#031q").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
		
		if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031r").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
		
		if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031s").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
		
		if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});

	$("#031t").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
		
		if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031u").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
		
		if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#031z").bind('keyup change', function(event) {
		var tmp_031 = "";

		if ($('#031a').val().length > 0) {
			tmp_031 = tmp_031 + '^a' + $('#031a').val();
		}

		if ($('#031b').val().length > 0) {
			tmp_031 = tmp_031 + '^b' + $('#031b').val();
		}
		if ($('#031c').val().length > 0) {
			tmp_031 = tmp_031 + '^c' + $('#031c').val();
		}

		if ($('#031d').val().length > 0) {
			tmp_031 = tmp_031 + '^d' + $('#031d').val();
		}
			if ($('#031e').val().length > 0) {
			tmp_031 = tmp_031 + '^e' + $('#031e').val();
		}

		if ($('#031f').val().length > 0) {
			tmp_031 = tmp_031 + '^f' + $('#031f').val();
		}
		if ($('#031g').val().length > 0) {
			tmp_031 = tmp_031 + '^g' + $('#031g').val();
		}

		if ($('#031m').val().length > 0) {
			tmp_031 = tmp_031 + '^m' + $('#031m').val();
		}
		
		if ($('#031n').val().length > 0) {
			tmp_031 = tmp_031 + '^n' + $('#031n').val();
		}

		if ($('#031o').val().length > 0) {
			tmp_031 = tmp_031 + '^o' + $('#031o').val();
		}
		if ($('#031p').val().length > 0) {
			tmp_031 = tmp_031 + '^p' + $('#031p').val();
		}

		if ($('#031q').val().length > 0) {
			tmp_031 = tmp_031 + '^q' + $('#031q').val();
		}
		if ($('#031r').val().length > 0) {
			tmp_031 = tmp_031 + '^r' + $('#031r').val();
		}
		if ($('#031s').val().length > 0) {
			tmp_031 = tmp_031 + '^s' + $('#031s').val();
		}
		if ($('#031t').val().length > 0) {
			tmp_031 = tmp_031 + '^t' + $('#031t').val();
		}
		if ($('#031u').val().length > 0) {
			tmp_031 = tmp_031 + '^u' + $('#031u').val();
		}
		if ($('#031z').val().length > 0) {
			tmp_031 = tmp_031 + '^z' + $('#031z').val();
		}
		if (tmp_031.length > 0) {
			$("#031").val('##' + tmp_031);
			$("#l-031").html('##' + tmp_031);
		} else {
			$("#031").val('');
			$("#l-031").html('&nbsp;');	
		}		
	});
	
	$("#040a").bind('keyup change', function(event) {
		var tmp_040 = "";

		if ($('#040a').val().length > 0) {
			tmp_040 = tmp_040 + '^a' + $('#040a').val();
		}

		if (tmp_040.length > 0) {
			$("#040").val('##' + tmp_040);
			$("#l-040").html('##' + tmp_040);
		} else {
			$("#040").val('');
			$("#l-040").html('&nbsp;');
		}
	});

	$("#041i1").change(function(event) {
		var tmp_041 = "";

		if ($('#041a').val().length > 0) {
			tmp_041 = tmp_041 + '^a' + $('#041a').val();
		}

		if ($('#041b').val().length > 0) {
			tmp_041 = tmp_041 + '^b' + $('#041b').val();
		}
		
		if ($('#041h').val().length > 0) {
			tmp_041 = tmp_041 + '^h' + $('#041h').val();
		}
		
		if (tmp_041.length > 0) {
			$("#041").val($("#041i1").val() + $("#041i2").val() + tmp_041);
			$("#l-041").html($("#041i1").val() + $("#041i2").val() + tmp_041);
		} else {
			$("#041").val('');
			$("#l-041").html('&nbsp;');
		}
	});

	$("#041i2").change(function(event) {
		var tmp_041 = "";

		if ($('#041a').val().length > 0) {
			tmp_041 = tmp_041 + '^a' + $('#041a').val();
		}

		if ($('#041b').val().length > 0) {
			tmp_041 = tmp_041 + '^b' + $('#041b').val();
		}
		
		if ($('#041h').val().length > 0) {
			tmp_041 = tmp_041 + '^h' + $('#041h').val();
		}
		
		if (tmp_041.length > 0) {
			$("#041").val($("#041i1").val() + $("#041i2").val() + tmp_041);
			$("#l-041").html($("#041i1").val() + $("#041i2").val() + tmp_041);
		} else {
			$("#041").val('');
			$("#l-041").html('&nbsp;');
		}
	});

	$("#041a").bind('keyup change', function(event) {
		var tmp_041 = "";

		if ($('#041a').val().length > 0) {
			tmp_041 = tmp_041 + '^a' + $('#041a').val();
		}

		if ($('#041b').val().length > 0) {
			tmp_041 = tmp_041 + '^b' + $('#041b').val();
		}
		
		if ($('#041h').val().length > 0) {
			tmp_041 = tmp_041 + '^h' + $('#041h').val();
		}
		
		if (tmp_041.length > 0) {
			$("#041").val($("#041i1").val() + $("#041i2").val() + tmp_041);
			$("#l-041").html($("#041i1").val() + $("#041i2").val() + tmp_041);
		} else {
			$("#041").val('');
			$("#l-041").html('&nbsp;');
		}
	});
	
	$("#041b").bind('keyup change', function(event) {
		var tmp_041 = "";

		if ($('#041a').val().length > 0) {
			tmp_041 = tmp_041 + '^a' + $('#041a').val();
		}

		if ($('#041b').val().length > 0) {
			tmp_041 = tmp_041 + '^b' + $('#041b').val();
		}

		if ($('#041h').val().length > 0) {
			tmp_041 = tmp_041 + '^h' + $('#041h').val();
		}
		
		if (tmp_041.length > 0) {
			$("#041").val($("#041i1").val() + $("#041i2").val() + tmp_041);
			$("#l-041").html($("#041i1").val() + $("#041i2").val() + tmp_041);
		} else {
			$("#041").val('');
			$("#l-041").html('&nbsp;');
		}
	});

	$("#041h").bind('keyup change', function(event) {
		var tmp_041 = "";

		if ($('#041a').val().length > 0) {
			tmp_041 = tmp_041 + '^a' + $('#041a').val();
		}

		if ($('#041b').val().length > 0) {
			tmp_041 = tmp_041 + '^b' + $('#041b').val();
		}

		if ($('#041h').val().length > 0) {
			tmp_041 = tmp_041 + '^h' + $('#041h').val();
		}
		
		if (tmp_041.length > 0) {
			$("#041").val($("#041i1").val() + $("#041i2").val() + tmp_041);
			$("#l-041").html($("#041i1").val() + $("#041i2").val() + tmp_041);
		} else {
			$("#041").val('');
			$("#l-041").html('&nbsp;');
		}
	});

	$("#044a").bind('keyup change', function(event) {
		if ($('#044a').val().length > 0) {
			$("#044").val('##' + '^a' + $('#044a').val());
			$("#l-044").html('##' + '^a' + $('#044a').val());
		} else {
			$("#044").val('');
			$("#l-044").html('&nbsp;');
		}
	});
	
	$("#047a").bind('keyup change', function(event) {
		var tmp_047 = "";

		if ($('#047a').val().length > 0) {
			tmp_047 = tmp_047 + '^a' + $('#047a').val();
		}

		if (tmp_047.length > 0) {
			$("#047").val('##' + tmp_047);
			$("#l-047").html('##' + tmp_047);
		} else {
			$("#047").val('');
			$("#l-047").html('&nbsp;');
		}
	});
	
	$("#048a").bind('keyup change', function(event) {
		var tmp_048 = "";

		if ($('#048a').val().length > 0) {
			tmp_048 = tmp_048 + '^a' + $('#048a').val();
		}
		if ($('#048b').val().length > 0) {
			tmp_048 = tmp_048 + '^b' + $('#048b').val();
		}
		if (tmp_048.length > 0) {
			$("#048").val($("#048i1").val() + $("#048i2").val() + tmp_048);
			$("#l-048").html($("#048i1").val() + $("#048i2").val() + tmp_048);
		} else {
			$("#048").val('');
			$("#l-048").html('&nbsp;');
		}
	});
	$("#048b").bind('keyup change', function(event) {
		var tmp_048 = "";

		if ($('#048a').val().length > 0) {
			tmp_048 = tmp_048 + '^a' + $('#048a').val();
		}
		if ($('#048b').val().length > 0) {
			tmp_048 = tmp_048 + '^b' + $('#048b').val();
		}
		if (tmp_048.length > 0) {
			$("#048").val($("#048i1").val() + $("#048i2").val() + tmp_048);
			$("#l-048").html($("#048i1").val() + $("#048i2").val() + tmp_048);
		} else {
			$("#048").val('');
			$("#l-048").html('&nbsp;');
		}
	});
	
	$("#049a").bind('keyup change', function(event) {
		var tmp_049 = "";

		if ($('#049a').val().length > 0) {
			tmp_049 = tmp_049 + '^a' + $('#049a').val();
		}
		if ($('#049b').val().length > 0) {
			tmp_049 = tmp_049 + '^b' + $('#049b').val();
		}
		if (tmp_049.length > 0) {
			$("#049").val('##' + tmp_049);
			$("#l-049").html('##' + tmp_049);
		} else {
			$("#049").val('');
		}	
	});

	$("#049b").bind('keyup change', function(event) {
		var tmp_049 = "";

		if ($('#049a').val().length > 0) {
			tmp_049 = tmp_049 + '^a' + $('#049a').val();
		}
		if ($('#049b').val().length > 0) {
			tmp_049 = tmp_049 + '^b' + $('#049b').val();
		}
		if (tmp_049.length > 0) {
			$("#049").val('##' + tmp_049);
			$("#l-049").html('##' + tmp_049);
		} else {
			$("#049").val('');
			$("#l-049").html('&nbsp;');
		}
	});
	
	
	$("#082i1").change(function(event) {
		var tmp_082 = "";

		if ($('#082a').val().length > 0) {
			tmp_082 = tmp_082 + '^a' + $('#082a').val();
		}

		if ($('#082b').val().length > 0) {
			tmp_082 = tmp_082 + '^b' + $('#082b').val();
		}
		
		if (tmp_082.length > 0) {
			$("#082").val($("#082i1").val() + $("#082i2").val() + tmp_082);
			$("#l-082").html($("#082i1").val() + $("#082i2").val() + tmp_082);
		} else {
			$("#082").val('');
			$("#l-082").html('&nbsp;');
		}
	});

	$("#082i2").change(function(event) {
		var tmp_082 = "";

		if ($('#082a').val().length > 0) {
			tmp_082 = tmp_082 + '^a' + $('#082a').val();
		}

		if ($('#082b').val().length > 0) {
			tmp_082 = tmp_082 + '^b' + $('#082b').val();
		}
		
		if (tmp_082.length > 0) {
			$("#082").val($("#082i1").val() + $("#082i2").val() + tmp_082);
			$("#l-082").html($("#082i1").val() + $("#082i2").val() + tmp_082);
		} else {
			$("#082").val('');
			$("#l-082").html('&nbsp;');
		}
	});

	$("#082a").bind('keyup change', function(event) {
		var tmp_082 = "";

		if ($('#082a').val().length > 0) {
			tmp_082 = tmp_082 + '^a' + $('#082a').val();
		}

		if ($('#082b').val().length > 0) {
			tmp_082 = tmp_082 + '^b' + $('#082b').val();
		}
		
		if (tmp_082.length > 0) {
			$("#082").val($("#082i1").val() + $("#082i2").val() + tmp_082);
			$("#l-082").html($("#082i1").val() + $("#082i2").val() + tmp_082);
		} else {
			$("#082").val('');
			$("#l-082").html('&nbsp;');
		}
	});
	
	$("#082b").bind('keyup change', function(event) {
		var tmp_082 = "";

		if ($('#082a').val().length > 0) {
			tmp_082 = tmp_082 + '^a' + $('#082a').val();
		}

		if ($('#082b').val().length > 0) {
			tmp_082 = tmp_082 + '^b' + $('#082b').val();
		}

		if (tmp_082.length > 0) {
			$("#082").val($("#082i1").val() + $("#082i2").val() + tmp_082);
			$("#l-082").html($("#082i1").val() + $("#082i2").val() + tmp_082);
		} else {
			$("#082").val('');
			$("#l-082").html('&nbsp;');
		}
	});

	$("#092a").bind('keyup change', function(event) {
		var tmp_092 = "";

		if ($('#092a').val().length > 0) {
			tmp_092 = tmp_092 + '^a' + $('#092a').val();
		}

		if ($('#092b').val().length > 0) {
			tmp_092 = tmp_092 + '^b' + $('#092b').val();
		}
		
		if ($('#092c').val().length > 0) {
			tmp_092 = tmp_092 + '^c' + $('#092c').val();
		}

		if (tmp_092.length > 0) {
			$("#092").val('##' + tmp_092);
			$("#l-092").html('##' + tmp_092);
		} else {
			$("#092").val('');
			$("#l-092").html('&nbsp;');
		}
	});

	$("#092b").bind('keyup change', function(event) {
		var tmp_092 = "";

		if ($('#092a').val().length > 0) {
			tmp_092 = tmp_092 + '^a' + $('#092a').val();
		}

		if ($('#092b').val().length > 0) {
			tmp_092 = tmp_092 + '^b' + $('#092b').val();
		}
		
		if ($('#092c').val().length > 0) {
			tmp_092 = tmp_092 + '^c' + $('#092c').val();
		}

		if (tmp_092.length > 0) {
			$("#092").val('##' + tmp_092);
			$("#l-092").html('##' + tmp_092);
		} else {
			$("#092").val('');
			$("#l-092").html('&nbsp;');
		}
	});

	$("#092c").bind('keyup change', function(event) {
		var tmp_092 = "";

		if ($('#092a').val().length > 0) {
			tmp_092 = tmp_092 + '^a' + $('#092a').val();
		}

		if ($('#092b').val().length > 0) {
			tmp_092 = tmp_092 + '^b' + $('#092b').val();
		}
		
		if ($('#092c').val().length > 0) {
			tmp_092 = tmp_092 + '^c' + $('#092c').val();
		}

		if (tmp_092.length > 0) {
			$("#092").val('##' + tmp_092);
			$("#l-092").html('##' + tmp_092);
		} else {
			$("#092").val('');
			$("#l-092").html('&nbsp;');
		}
	});
	
	$("#099a").bind('keyup change', function(event) {
		var tmp_099 = "";

		if ($('#099a').val().length > 0) {
			tmp_099 = tmp_099 + '^a' + $('#099a').val();
		}

		if ($('#099b').val().length > 0) {
			tmp_099 = tmp_099 + '^b' + $('#099b').val();
		}
		
		if (tmp_099.length > 0) {
			$("#099").val('##' + tmp_099);
			$("#l-099").html('##' + tmp_099);
		} else {
			$("#099").val('');
			$("#l-099").html('&nbsp;');
		}
	});
		$("#099b").bind('keyup change', function(event) {
		var tmp_099 = "";

		if ($('#099a').val().length > 0) {
			tmp_099 = tmp_099 + '^a' + $('#099a').val();
		}

		if ($('#099b').val().length > 0) {
			tmp_099 = tmp_099 + '^b' + $('#099b').val();
		}
		
		if (tmp_099.length > 0) {
			$("#099").val('##' + tmp_099);
			$("#l-099").html('##' + tmp_099);
		} else {
			$("#099").val('');
			$("#l-099").html('&nbsp;');
		}
	});

	$("#100i1").change(function(event) {
		var tmp_100 = "";

		if ($('#100a').val().length > 0) {
			tmp_100 = tmp_100 + '^a' + $('#100a').val();
		}

		if ($('#100d').val().length > 0) {
			tmp_100 = tmp_100 + '^d' + $('#100d').val();
		}
		
		if (tmp_100.length > 0) {
			$("#100").val($("#100i1").val() + $("#100i2").val() + tmp_100);
			$("#l-100").html($("#100i1").val() + $("#100i2").val() + tmp_100);
		} else {
			$("#100").val('');
			$("#l-100").html('&nbsp;');
		}
	});

	$("#100i2").change(function(event) {
		var tmp_100 = "";

		if ($('#100a').val().length > 0) {
			tmp_100 = tmp_100 + '^a' + $('#100a').val();
		}

		if ($('#100d').val().length > 0) {
			tmp_100 = tmp_100 + '^d' + $('#100d').val();
		}
		
		if (tmp_100.length > 0) {
			$("#100").val($("#100i1").val() + $("#100i2").val() + tmp_100);
			$("#l-100").html($("#100i1").val() + $("#100i2").val() + tmp_100);
		} else {
			$("#100").val('');
			$("#l-100").html('&nbsp;');
		}
	});

	$("#100a").bind('keyup change', function(event) {
		var tmp_100 = "";

		if ($('#100a').val().length > 0) {
			tmp_100 = tmp_100 + '^a' + $('#100a').val();
		}

		if ($('#100d').val().length > 0) {
			tmp_100 = tmp_100 + '^d' + $('#100d').val();
		}
		
		if (tmp_100.length > 0) {
			$("#100").val($("#100i1").val() + $("#100i2").val() + tmp_100);
			$("#l-100").html($("#100i1").val() + $("#100i2").val() + tmp_100);
		} else {
			$("#100").val('');
			$("#l-100").html('&nbsp;');
		}
	});
	
	$("#100d").bind('keyup change', function(event) {
		var tmp_100 = "";

		if ($('#100a').val().length > 0) {
			tmp_100 = tmp_100 + '^a' + $('#100a').val();
		}

		if ($('#100d').val().length > 0) {
			tmp_100 = tmp_100 + '^d' + $('#100d').val();
		}

		if (tmp_100.length > 0) {
			$("#100").val($("#100i1").val() + $("#100i2").val() + tmp_100);
			$("#l-100").html($("#100i1").val() + $("#100i2").val() + tmp_100);
		} else {
			$("#100").val('');
			$("#l-100").html('&nbsp;');
		}
	});

	$("#110i1").change(function(event) {
		var tmp_110 = "";

		if ($('#110a').val().length > 0) {
			tmp_110 = tmp_110 + '^a' + $('#110a').val();
		}

		if ($('#110b').val().length > 0) {
			tmp_110 = tmp_110 + '^b' + $('#110b').val();
		}
		
		if (tmp_110.length > 0) {
			$("#110").val($("#110i1").val() + $("#110i2").val() + tmp_110);
			$("#l-110").html($("#110i1").val() + $("#110i2").val() + tmp_110);
		} else {
			$("#110").val('');
			$("#l-110").html('&nbsp;');
		}
	});

	$("#110i2").change(function(event) {
		var tmp_110 = "";

		if ($('#110a').val().length > 0) {
			tmp_110 = tmp_110 + '^a' + $('#110a').val();
		}

		if ($('#110b').val().length > 0) {
			tmp_110 = tmp_110 + '^b' + $('#110b').val();
		}
		
		if (tmp_110.length > 0) {
			$("#110").val($("#110i1").val() + $("#110i2").val() + tmp_110);
			$("#l-110").html($("#110i1").val() + $("#110i2").val() + tmp_110);
		} else {
			$("#110").val('');
			$("#l-110").html('&nbsp;');
		}
	});

	$("#110a").bind('keyup change', function(event) {
		var tmp_110 = "";

		if ($('#110a').val().length > 0) {
			tmp_110 = tmp_110 + '^a' + $('#110a').val();
		}

		if ($('#110b').val().length > 0) {
			tmp_110 = tmp_110 + '^b' + $('#110b').val();
		}
		
		if (tmp_110.length > 0) {
			$("#110").val($("#110i1").val() + $("#110i2").val() + tmp_110);
			$("#l-110").html($("#110i1").val() + $("#110i2").val() + tmp_110);
		} else {
			$("#110").val('');
			$("#l-110").html('&nbsp;');
		}
	});
	
	$("#110b").bind('keyup change', function(event) {
		var tmp_110 = "";

		if ($('#110a').val().length > 0) {
			tmp_110 = tmp_110 + '^a' + $('#110a').val();
		}

		if ($('#110b').val().length > 0) {
			tmp_110 = tmp_110 + '^b' + $('#110b').val();
		}

		if (tmp_110.length > 0) {
			$("#110").val($("#110i1").val() + $("#110i2").val() + tmp_110);
			$("#l-110").html($("#110i1").val() + $("#110i2").val() + tmp_110);
		} else {
			$("#110").val('');
			$("#l-110").html('&nbsp;');
		}
	});

	$("#130i1").change(function(event) {
		var tmp_130 = "";

		if ($('#130a').val().length > 0) {
			tmp_130 = tmp_130 + '^a' + $('#130a').val();
		}

		if ($('#130n').val().length > 0) {
			tmp_130 = tmp_130 + '^n' + $('#130n').val();
		}
		
		if ($('#130p').val().length > 0) {
			tmp_130 = tmp_130 + '^p' + $('#130p').val();
		}
		
		if (tmp_130.length > 0) {
			$("#130").val($("#130i1").val() + $("#130i2").val() + tmp_130);
			$("#l-130").html($("#130i1").val() + $("#130i2").val() + tmp_130);
		} else {
			$("#130").val('');
			$("#l-130").html('&nbsp;');
		}
	});

	$("#130i2").change(function(event) {
		var tmp_130 = "";

		if ($('#130a').val().length > 0) {
			tmp_130 = tmp_130 + '^a' + $('#130a').val();
		}

		if ($('#130n').val().length > 0) {
			tmp_130 = tmp_130 + '^n' + $('#130n').val();
		}
		
		if ($('#130p').val().length > 0) {
			tmp_130 = tmp_130 + '^p' + $('#130p').val();
		}
		
		if (tmp_130.length > 0) {
			$("#130").val($("#130i1").val() + $("#130i2").val() + tmp_130);
			$("#l-130").html($("#130i1").val() + $("#130i2").val() + tmp_130);
		} else {
			$("#130").val('');
			$("#l-130").html('&nbsp;');
		}
	});

	$("#130a").bind('keyup change', function(event) {
		var tmp_130 = "";

		if ($('#130a').val().length > 0) {
			tmp_130 = tmp_130 + '^a' + $('#130a').val();
		}

		if ($('#130n').val().length > 0) {
			tmp_130 = tmp_130 + '^n' + $('#130n').val();
		}
		
		if ($('#130p').val().length > 0) {
			tmp_130 = tmp_130 + '^p' + $('#130p').val();
		}
		
		if (tmp_130.length > 0) {
			$("#130").val($("#130i1").val() + $("#130i2").val() + tmp_130);
			$("#l-130").html($("#130i1").val() + $("#130i2").val() + tmp_130);
		} else {
			$("#130").val('');
			$("#l-130").html('&nbsp;');
		}
	});
	
	$("#130n").bind('keyup change', function(event) {
		var tmp_130 = "";

		if ($('#130a').val().length > 0) {
			tmp_130 = tmp_130 + '^a' + $('#130a').val();
		}

		if ($('#130n').val().length > 0) {
			tmp_130 = tmp_130 + '^n' + $('#130n').val();
		}

		if ($('#130p').val().length > 0) {
			tmp_130 = tmp_130 + '^p' + $('#130p').val();
		}
		
		if (tmp_130.length > 0) {
			$("#130").val($("#130i1").val() + $("#130i2").val() + tmp_130);
			$("#l-130").html($("#130i1").val() + $("#130i2").val() + tmp_130);
		} else {
			$("#130").val('');
			$("#l-130").html('&nbsp;');
		}
	});

	$("#130p").bind('keyup change', function(event) {
		var tmp_130 = "";

		if ($('#130a').val().length > 0) {
			tmp_130 = tmp_130 + '^a' + $('#130a').val();
		}

		if ($('#130n').val().length > 0) {
			tmp_130 = tmp_130 + '^n' + $('#130n').val();
		}

		if ($('#130p').val().length > 0) {
			tmp_130 = tmp_130 + '^p' + $('#130p').val();
		}
		
		if (tmp_130.length > 0) {
			$("#130").val($("#130i1").val() + $("#130i2").val() + tmp_130);
			$("#l-130").html($("#130i1").val() + $("#130i2").val() + tmp_130);
		} else {
			$("#130").val('');
			$("#l-130").html('&nbsp;');
		}
	});

	$("#222i1").change(function(event) {
		var tmp_222 = "";

		if ($('#222a').val().length > 0) {
			tmp_222 = tmp_222 + '^a' + $('#222a').val();
		}

		if ($('#222b').val().length > 0) {
			tmp_222 = tmp_222 + '^b' + $('#222b').val();
		}
		
		if (tmp_222.length > 0) {
			$("#222").val($("#222i1").val() + $("#222i2").val() + tmp_222);
			$("#l-222").html($("#222i1").val() + $("#222i2").val() + tmp_222);
		} else {
			$("#222").val('');
			$("#l-222").html('&nbsp;');
		}
	});

	$("#222i2").change(function(event) {
		var tmp_222 = "";

		if ($('#222a').val().length > 0) {
			tmp_222 = tmp_222 + '^a' + $('#222a').val();
		}

		if ($('#222b').val().length > 0) {
			tmp_222 = tmp_222 + '^b' + $('#222b').val();
		}
		
		if (tmp_222.length > 0) {
			$("#222").val($("#222i1").val() + $("#222i2").val() + tmp_222);
			$("#l-222").html($("#222i1").val() + $("#222i2").val() + tmp_222);
		} else {
			$("#222").val('');
			$("#l-222").html('&nbsp;');
		}
	});

	$("#222a").bind('keyup change', function(event) {
		var tmp_222 = "";

		if ($('#222a').val().length > 0) {
			tmp_222 = tmp_222 + '^a' + $('#222a').val();
		}

		if ($('#222b').val().length > 0) {
			tmp_222 = tmp_222 + '^b' + $('#222b').val();
		}
		
		if (tmp_222.length > 0) {
			$("#222").val($("#222i1").val() + $("#222i2").val() + tmp_222);
			$("#l-222").html($("#222i1").val() + $("#222i2").val() + tmp_222);
		} else {
			$("#222").val('');
			$("#l-222").html('&nbsp;');
		}
	});
	
	$("#222b").bind('keyup change', function(event) {
		var tmp_222 = "";

		if ($('#222a').val().length > 0) {
			tmp_222 = tmp_222 + '^a' + $('#222a').val();
		}

		if ($('#222b').val().length > 0) {
			tmp_222 = tmp_222 + '^b' + $('#222b').val();
		}

		if (tmp_222.length > 0) {
			$("#222").val($("#222i1").val() + $("#222i2").val() + tmp_222);
			$("#l-222").html($("#222i1").val() + $("#222i2").val() + tmp_222);
		} else {
			$("#222").val('');
			$("#l-222").html('&nbsp;');
		}
	});

	$("#240i1").change(function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}
		if ($('#240m').val().length > 0) {
			tmp_240 = tmp_240 + '^m' + $('#240m').val();
		}
		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}
		if ($('#240o').val().length > 0) {
			tmp_240 = tmp_240 + '^o' + $('#240o').val();
		}
		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		if ($('#240r').val().length > 0) {
			tmp_240 = tmp_240 + '^r' + $('#240r').val();
		}
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});

	$("#240i2").change(function(event) {
		var tmp_240 = "";
		
		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}
		if ($('#240m').val().length > 0) {
			tmp_240 = tmp_240 + '^m' + $('#240m').val();
		}
		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}
		if ($('#240o').val().length > 0) {
			tmp_240 = tmp_240 + '^o' + $('#240o').val();
		}
		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		if ($('#240r').val().length > 0) {
			tmp_240 = tmp_240 + '^r' + $('#240r').val();
		}
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});
	
	$("#240a").bind('keyup change', function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}
		if ($('#240m').val().length > 0) {
			tmp_240 = tmp_240 + '^m' + $('#240m').val();
		}
		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}
		if ($('#240o').val().length > 0) {
			tmp_240 = tmp_240 + '^o' + $('#240o').val();
		}
		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		if ($('#240r').val().length > 0) {
			tmp_240 = tmp_240 + '^r' + $('#240r').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});
	
	$("#240m").bind('keyup change', function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}
		if ($('#240m').val().length > 0) {
			tmp_240 = tmp_240 + '^m' + $('#240m').val();
		}
		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}
		if ($('#240o').val().length > 0) {
			tmp_240 = tmp_240 + '^o' + $('#240o').val();
		}
		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		if ($('#240r').val().length > 0) {
			tmp_240 = tmp_240 + '^r' + $('#240r').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});

	$("#240n").bind('keyup change', function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}
		if ($('#240m').val().length > 0) {
			tmp_240 = tmp_240 + '^m' + $('#240m').val();
		}
		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}
		if ($('#240o').val().length > 0) {
			tmp_240 = tmp_240 + '^o' + $('#240o').val();
		}
		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		if ($('#240r').val().length > 0) {
			tmp_240 = tmp_240 + '^r' + $('#240r').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});
	
	$("#240o").bind('keyup change', function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}
		if ($('#240m').val().length > 0) {
			tmp_240 = tmp_240 + '^m' + $('#240m').val();
		}
		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}
		if ($('#240o').val().length > 0) {
			tmp_240 = tmp_240 + '^o' + $('#240o').val();
		}
		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		if ($('#240r').val().length > 0) {
			tmp_240 = tmp_240 + '^r' + $('#240r').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});

	$("#240p").bind('keyup change', function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}
		if ($('#240m').val().length > 0) {
			tmp_240 = tmp_240 + '^m' + $('#240m').val();
		}
		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}
		if ($('#240o').val().length > 0) {
			tmp_240 = tmp_240 + '^o' + $('#240o').val();
		}
		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		if ($('#240r').val().length > 0) {
			tmp_240 = tmp_240 + '^r' + $('#240r').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});
	
	$("#240r").bind('keyup change', function(event) {
		var tmp_240 = "";

		if ($('#240a').val().length > 0) {
			tmp_240 = tmp_240 + '^a' + $('#240a').val();
		}
		if ($('#240m').val().length > 0) {
			tmp_240 = tmp_240 + '^m' + $('#240m').val();
		}
		if ($('#240n').val().length > 0) {
			tmp_240 = tmp_240 + '^n' + $('#240n').val();
		}
		if ($('#240o').val().length > 0) {
			tmp_240 = tmp_240 + '^o' + $('#240o').val();
		}
		if ($('#240p').val().length > 0) {
			tmp_240 = tmp_240 + '^p' + $('#240p').val();
		}
		if ($('#240r').val().length > 0) {
			tmp_240 = tmp_240 + '^r' + $('#240r').val();
		}
		
		if (tmp_240.length > 0) {
			$("#240").val($("#240i1").val() + $("#240i2").val() + tmp_240);
			$("#l-240").html($("#240i1").val() + $("#240i2").val() + tmp_240);
		} else {
			$("#240").val('');
			$("#l-240").html('&nbsp;');
		}
	});
	
	$("#245i1").change(function(event) {
		var tmp_245 = "";

		if ($('#245a').val().length > 0) {
			tmp_245 = tmp_245 + '^a' + $('#245a').val();
		}

		if ($('#245b').val().length > 0) {
			tmp_245 = tmp_245 + '^b' + $('#245b').val();
		}

		if ($('#245c').val().length > 0) {
			tmp_245 = tmp_245 + '^c' + $('#245c').val();
		}

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});

	$("#245i2").change(function(event) {
		var tmp_245 = "";

		if ($('#245a').val().length > 0) {
			tmp_245 = tmp_245 + '^a' + $('#245a').val();
		}

		if ($('#245b').val().length > 0) {
			tmp_245 = tmp_245 + '^b' + $('#245b').val();
		}

		if ($('#245c').val().length > 0) {
			tmp_245 = tmp_245 + '^c' + $('#245c').val();
		}

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});
	
	$("#245a").bind('keyup change', function(event) {
		var tmp_245 = "";

		if ($('#245a').val().length > 0) {
			tmp_245 = tmp_245 + '^a' + $('#245a').val();
		}

		if ($('#245b').val().length > 0) {
			tmp_245 = tmp_245 + '^b' + $('#245b').val();
		}

		if ($('#245c').val().length > 0) {
			tmp_245 = tmp_245 + '^c' + $('#245c').val();
		}

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});

	$("#245b").bind('keyup change', function(event) {
		var tmp_245 = "";

		if ($('#245a').val().length > 0) {
			tmp_245 = tmp_245 + '^a' + $('#245a').val();
		}

		if ($('#245b').val().length > 0) {
			tmp_245 = tmp_245 + '^b' + $('#245b').val();
		}

		if ($('#245c').val().length > 0) {
			tmp_245 = tmp_245 + '^c' + $('#245c').val();
		}

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});

	$("#245c").bind('keyup change', function(event) {
		var tmp_245 = "";

		if ($('#245a').val().length > 0) {
			tmp_245 = tmp_245 + '^a' + $('#245a').val();
		}

		if ($('#245b').val().length > 0) {
			tmp_245 = tmp_245 + '^b' + $('#245b').val();
		}

		if ($('#245c').val().length > 0) {
			tmp_245 = tmp_245 + '^c' + $('#245c').val();
		}

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});

	$("#245h").bind('keyup change', function(event) {
		var tmp_245 = "";

		if ($('#245a').val().length > 0) {
			tmp_245 = tmp_245 + '^a' + $('#245a').val();
		}

		if ($('#245b').val().length > 0) {
			tmp_245 = tmp_245 + '^b' + $('#245b').val();
		}

		if ($('#245c').val().length > 0) {
			tmp_245 = tmp_245 + '^c' + $('#245c').val();
		}

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
	});

	$("#246i1").change(function(event) {
		var tmp_246 = "";

		if ($('#246a').val().length > 0) {
			tmp_246 = tmp_246 + '^a' + $('#246a').val();
		}

		if ($('#246b').val().length > 0) {
			tmp_246 = tmp_246 + '^b' + $('#246b').val();
		}

		if ($('#246i').val().length > 0) {
			tmp_246 = tmp_246 + '^i' + $('#246i').val();
		}
		
		if (tmp_246.length > 0) {
			$("#246").val($("#246i1").val() + $("#246i2").val() + tmp_246);
			$("#l-246").html($("#246i1").val() + $("#246i2").val() + tmp_246);
		} else {
			$("#246").val('');
			$("#l-246").html('&nbsp;');
		}
	});

	$("#246i2").change(function(event) {
		var tmp_246 = "";

		if ($('#246a').val().length > 0) {
			tmp_246 = tmp_246 + '^a' + $('#246a').val();
		}

		if ($('#246b').val().length > 0) {
			tmp_246 = tmp_246 + '^b' + $('#246b').val();
		}

		if ($('#246i').val().length > 0) {
			tmp_246 = tmp_246 + '^i' + $('#246i').val();
		}

		if (tmp_246.length > 0) {
			$("#246").val($("#246i1").val() + $("#246i2").val() + tmp_246);
			$("#l-246").html($("#246i1").val() + $("#246i2").val() + tmp_246);
		} else {
			$("#246").val('');
			$("#l-246").html('&nbsp;');
		}
	});
	
	$("#246a").bind('keyup change', function(event) {
		var tmp_246 = "";

		if ($('#246a').val().length > 0) {
			tmp_246 = tmp_246 + '^a' + $('#246a').val();
		}

		if ($('#246b').val().length > 0) {
			tmp_246 = tmp_246 + '^b' + $('#246b').val();
		}

		if ($('#246i').val().length > 0) {
			tmp_246 = tmp_246 + '^i' + $('#246i').val();
		}

		if (tmp_246.length > 0) {
			$("#246").val($("#246i1").val() + $("#246i2").val() + tmp_246);
			$("#l-246").html($("#246i1").val() + $("#246i2").val() + tmp_246);
		} else {
			$("#246").val('');
			$("#l-246").html('&nbsp;');
		}
	});

	$("#246b").bind('keyup change', function(event) {
		var tmp_246 = "";

		if ($('#246a').val().length > 0) {
			tmp_246 = tmp_246 + '^a' + $('#246a').val();
		}

		if ($('#246b').val().length > 0) {
			tmp_246 = tmp_246 + '^b' + $('#246b').val();
		}

		if ($('#246i').val().length > 0) {
			tmp_246 = tmp_246 + '^i' + $('#246i').val();
		}

		if (tmp_246.length > 0) {
			$("#246").val($("#246i1").val() + $("#246i2").val() + tmp_246);
			$("#l-246").html($("#246i1").val() + $("#246i2").val() + tmp_246);
		} else {
			$("#246").val('');
			$("#l-246").html('&nbsp;');
		}
	});

	$("#246i").bind('keyup change', function(event) {
		var tmp_246 = "";

		if ($('#246a').val().length > 0) {
			tmp_246 = tmp_246 + '^a' + $('#246a').val();
		}

		if ($('#246b').val().length > 0) {
			tmp_246 = tmp_246 + '^b' + $('#246b').val();
		}

		if ($('#246i').val().length > 0) {
			tmp_246 = tmp_246 + '^i' + $('#246i').val();
		}

		if (tmp_246.length > 0) {
			$("#246").val($("#246i1").val() + $("#246i2").val() + tmp_246);
			$("#l-246").html($("#246i1").val() + $("#246i2").val() + tmp_246);
		} else {
			$("#246").val('');
			$("#l-246").html('&nbsp;');
		}
	});

	$("#247a").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#247b").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#247f").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#247g").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#247n").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#247p").bind('keyup change', function(event) {
		var tmp_247 = "";

		if ($('#247a').val().length > 0) {
			tmp_247 = tmp_247 + '^a' + $('#247a').val();
		}

		if ($('#247b').val().length > 0) {
			tmp_247 = tmp_247 + '^b' + $('#247b').val();
		}

		if ($('#247f').val().length > 0) {
			tmp_247 = tmp_247 + '^f' + $('#247f').val();
		}

		if ($('#247g').val().length > 0) {
			tmp_247 = tmp_247 + '^g' + $('#247g').val();
		}

		if ($('#247n').val().length > 0) {
			tmp_247 = tmp_247 + '^n' + $('#247n').val();
		}

		if ($('#247p').val().length > 0) {
			tmp_247 = tmp_247 + '^p' + $('#247p').val();
		}
		
		if (tmp_247.length > 0) {
			$("#247").val('##' + tmp_247);
			$("#l-247").html('##' + tmp_247);
		} else {
			$("#247").val('');
			$("#l-247").html('&nbsp;');
		}
	});

	$("#250a").bind('keyup change', function(event) {
		var tmp_250 = "";

		if ($('#250a').val().length > 0) {
			tmp_250 = tmp_250 + '^a' + $('#250a').val();
		}

		if ($('#250b').val().length > 0) {
			tmp_250 = tmp_250 + '^b' + $('#250b').val();
		}
		
		if (tmp_250.length > 0) {
			$("#250").val('##' + tmp_250);
			$("#l-250").html('##' + tmp_250);
		} else {
			$("#250").val('');
			$("#l-250").html('&nbsp;');
		}
	});

	$("#250b").bind('keyup change', function(event) {
		var tmp_250 = "";

		if ($('#250a').val().length > 0) {
			tmp_250 = tmp_250 + '^a' + $('#250a').val();
		}

		if ($('#250b').val().length > 0) {
			tmp_250 = tmp_250 + '^b' + $('#250b').val();
		}
		
		if (tmp_250.length > 0) {
			$("#250").val('##' + tmp_250);
			$("#l-250").html('##' + tmp_250);
		} else {
			$("#250").val('');
			$("#l-250").html('&nbsp;');
		}
	});
	
	$("#254a").bind('keyup change', function(event) {
		var tmp_254 = "";

		if ($('#254a').val().length > 0) {
			tmp_254 = tmp_254 + '^a' + $('#254a').val();
		}

		if ($('#254b').val().length > 0) {
			tmp_254 = tmp_254 + '^b' + $('#254b').val();
		}
		
		if (tmp_254.length > 0) {
			$("#254").val('##' + tmp_254);
			$("#l-254").html('##' + tmp_254);
		} else {
			$("#254").val('');
			$("#l-254").html('&nbsp;');
		}
	});
	
	$("#254b").bind('keyup change', function(event) {
		var tmp_254 = "";

		if ($('#254a').val().length > 0) {
			tmp_254 = tmp_254 + '^a' + $('#254a').val();
		}

		if ($('#254b').val().length > 0) {
			tmp_254 = tmp_254 + '^b' + $('#254b').val();
		}
		
		if (tmp_254.length > 0) {
			$("#254").val('##' + tmp_254);
			$("#l-254").html('##' + tmp_254);
		} else {
			$("#254").val('');
			$("#l-254").html('&nbsp;');
		}
	});

	$("#260a").bind('keyup change', function(event) {
		var tmp_260 = "";

		if ($('#260a').val().length > 0) {
			tmp_260 = tmp_260 + '^a' + $('#260a').val();
		}

		if ($('#260b').val().length > 0) {
			tmp_260 = tmp_260 + '^b' + $('#260b').val();
		}

		if ($('#260c').val().length > 0) {
			tmp_260 = tmp_260 + '^c' + $('#260c').val();
		}
		
		if (tmp_260.length > 0) {
			$("#260").val('##' + tmp_260);
			$("#l-260").html('##' + tmp_260);
		} else {
			$("#260").val('');
			$("#l-260").html('&nbsp;');
		}
	});

	$("#260b").bind('keyup change', function(event) {
		var tmp_260 = "";

		if ($('#260a').val().length > 0) {
			tmp_260 = tmp_260 + '^a' + $('#260a').val();
		}

		if ($('#260b').val().length > 0) {
			tmp_260 = tmp_260 + '^b' + $('#260b').val();
		}

		if ($('#260c').val().length > 0) {
			tmp_260 = tmp_260 + '^c' + $('#260c').val();
		}
		
		if (tmp_260.length > 0) {
			$("#260").val('##' + tmp_260);
			$("#l-260").html('##' + tmp_260);
		} else {
			$("#260").val('');
			$("#l-260").html('&nbsp;');
		}
	});

	$("#260c").bind('keyup change', function(event) {
		var tmp_260 = "";

		if ($('#260a').val().length > 0) {
			tmp_260 = tmp_260 + '^a' + $('#260a').val();
		}

		if ($('#260b').val().length > 0) {
			tmp_260 = tmp_260 + '^b' + $('#260b').val();
		}

		if ($('#260c').val().length > 0) {
			tmp_260 = tmp_260 + '^c' + $('#260c').val();
		}
		
		if (tmp_260.length > 0) {
			$("#260").val('##' + tmp_260);
			$("#l-260").html('##' + tmp_260);
		} else {
			$("#260").val('');
			$("#l-260").html('&nbsp;');
		}

		// Calculo del siglo segun el año.
		var year = $(this).val();
		
		if ((year.length == 4) && (!isNaN(year))) {
			var y = year.substr(0, 2);
			var z = year.substr(2, 2);
			var w = "";

			if (z != "00") {
				y++;
			}
			
			if (y == 17) {$("#690a option[value=XVII]").attr("selected", true); w = "XVII";}
			if (y == 18) {$("#690a option[value=XVIII]").attr("selected", true); w = "XVIII";}
			if (y == 19) {$("#690a option[value=XIX]").attr("selected", true); w = "XIX";}
			if (y == 20) {$("#690a option[value=XX]").attr("selected", true); w = "XX";}

			var tmp_690 = '^a' + w;
			
			if (tmp_690.length > 0) {
				$("#690").val('##' + tmp_690);
				$("#l-690").html('##' + tmp_690);
			} else {
				$("#690").val('');
				$("#l-690").html('&nbsp;');
			}
		}
		
	});

	<?php
	/*	if ($item['Item']['year']) {
			// Cálculo de siglo de acuerdo al año.
			if (substr($item['Item']['year'], 2, 2) != "00"){
				echo $centuries[substr($item['Item']['year'], 0, 2) + 1];
			} else {
				echo $centuries[substr($item['Item']['year'], 0, 2)];
			}
		}*/
	?>
		
	$("#300a").bind('keyup change', function(event) {
		var tmp_300 = "";

		if ($('#300a').val().length > 0) {
			tmp_300 = tmp_300 + '^a' + $('#300a').val();
		}

		if ($('#300b').val().length > 0) {
			tmp_300 = tmp_300 + '^b' + $('#300b').val();
		}

		if ($('#300c').val().length > 0) {
			tmp_300 = tmp_300 + '^c' + $('#300c').val();
		}

		if ($('#300e').val().length > 0) {
			tmp_300 = tmp_300 + '^e' + $('#300e').val();
		}
		
		if (tmp_300.length > 0) {
			$("#300").val('##' + tmp_300);
			$("#l-300").html('##' + tmp_300);
		} else {
			$("#300").val('');
			$("#l-300").html('&nbsp;');
		}
	});

	$("#300b").bind('keyup change', function(event) {
		var tmp_300 = "";

		if ($('#300a').val().length > 0) {
			tmp_300 = tmp_300 + '^a' + $('#300a').val();
		}

		if ($('#300b').val().length > 0) {
			tmp_300 = tmp_300 + '^b' + $('#300b').val();
		}

		if ($('#300c').val().length > 0) {
			tmp_300 = tmp_300 + '^c' + $('#300c').val();
		}

		if ($('#300e').val().length > 0) {
			tmp_300 = tmp_300 + '^e' + $('#300e').val();
		}
		
		if (tmp_300.length > 0) {
			$("#300").val('##' + tmp_300);
			$("#l-300").html('##' + tmp_300);
		} else {
			$("#300").val('');
			$("#l-300").html('&nbsp;');
		}
	});

	$("#300c").bind('keyup change', function(event) {
		var tmp_300 = "";

		if ($('#300a').val().length > 0) {
			tmp_300 = tmp_300 + '^a' + $('#300a').val();
		}

		if ($('#300b').val().length > 0) {
			tmp_300 = tmp_300 + '^b' + $('#300b').val();
		}

		if ($('#300c').val().length > 0) {
			tmp_300 = tmp_300 + '^c' + $('#300c').val();
		}

		if ($('#300e').val().length > 0) {
			tmp_300 = tmp_300 + '^e' + $('#300e').val();
		}
		
		if (tmp_300.length > 0) {
			$("#300").val('##' + tmp_300);
			$("#l-300").html('##' + tmp_300);
		} else {
			$("#300").val('');
			$("#l-300").html('&nbsp;');
		}
	});

	$("#300e").bind('keyup change', function(event) {
		var tmp_300 = "";

		if ($('#300a').val().length > 0) {
			tmp_300 = tmp_300 + '^a' + $('#300a').val();
		}

		if ($('#300b').val().length > 0) {
			tmp_300 = tmp_300 + '^b' + $('#300b').val();
		}

		if ($('#300c').val().length > 0) {
			tmp_300 = tmp_300 + '^c' + $('#300c').val();
		}

		if ($('#300e').val().length > 0) {
			tmp_300 = tmp_300 + '^e' + $('#300e').val();
		}
		
		if (tmp_300.length > 0) {
			$("#300").val('##' + tmp_300);
			$("#l-300").html('##' + tmp_300);
		} else {
			$("#300").val('');
			$("#l-300").html('&nbsp;');
		}
	});
	
	$("#306a").bind('keyup change', function(event) {
		var tmp_306 = "";

		if ($('#306a').val().length > 0) {
			tmp_306 = tmp_306 + '^a' + $('#306a').val();
		}

		if ($('#306b').val().length > 0) {
			tmp_306= tmp_306 + '^b' + $('#306b').val();
		}
		
		if (tmp_306.length > 0) {
			$("#306").val('##' + tmp_306);
			$("#l-306").html('##' + tmp_306);
		} else {
			$("#306").val('');
			$("#l-306").html('&nbsp;');
		}
	});
	
	$("#306b").bind('keyup change', function(event) {
		var tmp_306 = "";

		if ($('#306a').val().length > 0) {
			tmp_306 = tmp_306 + '^a' + $('#306a').val();
		}

		if ($('#306b').val().length > 0) {
			tmp_306= tmp_306 + '^b' + $('#306b').val();
		}
		
		if (tmp_306.length > 0) {
			$("#306").val('##' + tmp_306);
			$("#l-306").html('##' + tmp_306);
		} else {
			$("#306").val('');
			$("#l-306").html('&nbsp;');
		}
	});

	$("#310a").bind('keyup change', function(event) {
		var tmp_310 = "";

		if ($('#310a').val().length > 0) {
			tmp_310 = tmp_310 + '^a' + $('#310a').val();
		}

		if ($('#310b').val().length > 0) {
			tmp_310 = tmp_310 + '^b' + $('#310b').val();
		}
		
		if (tmp_310.length > 0) {
			$("#310").val('##' + tmp_310);
			$("#l-310").html('##' + tmp_310);
		} else {
			$("#310").val('');
			$("#l-310").html('&nbsp;');
		}
	});

	$("#310b").bind('keyup change', function(event) {
		var tmp_310 = "";

		if ($('#310a').val().length > 0) {
			tmp_310 = tmp_310 + '^a' + $('#310a').val();
		}

		if ($('#310b').val().length > 0) {
			tmp_310 = tmp_310 + '^b' + $('#310b').val();
		}
		
		if (tmp_310.length > 0) {
			$("#310").val('##' + tmp_310);
			$("#l-310").html('##' + tmp_310);
		} else {
			$("#310").val('');
			$("#l-310").html('&nbsp;');
		}
	});

	$("#321a").bind('keyup change', function(event) {
		var tmp_321 = "";

		if ($('#321a').val().length > 0) {
			tmp_321 = tmp_321 + '^a' + $('#321a').val();
		}

		if ($('#321b').val().length > 0) {
			tmp_321 = tmp_321 + '^b' + $('#321b').val();
		}
		
		if (tmp_321.length > 0) {
			$("#321").val('##' + tmp_321);
			$("#l-321").html('##' + tmp_321);
		} else {
			$("#321").val('');
			$("#l-321").html('&nbsp;');
		}
	});

	$("#321b").bind('keyup change', function(event) {
		var tmp_321 = "";

		if ($('#321a').val().length > 0) {
			tmp_321 = tmp_321 + '^a' + $('#321a').val();
		}

		if ($('#321b').val().length > 0) {
			tmp_321 = tmp_321 + '^b' + $('#321b').val();
		}
		
		if (tmp_321.length > 0) {
			$("#321").val('##' + tmp_321);
			$("#l-321").html('##' + tmp_321);
		} else {
			$("#321").val('');
			$("#l-321").html('&nbsp;');
		}
	});
	$("#336a").bind('keyup change', function(event) {
		var tmp_336 = "";

		if ($('#336a').val().length > 0) {
			tmp_336 = tmp_336 + '^a' + $('#336a').val();
		}

		if ($('#336b').val().length > 0) {
			tmp_336 = tmp_336 + '^b' + $('#336b').val();
		}
		
		if (tmp_336.length > 0) {
			$("#336").val('##' + tmp_336);
			$("#l-336").html('##' + tmp_336);
		} else {
			$("#336").val('');
			$("#l-336").html('&nbsp;');
		}
	});
	
	$("#336b").bind('keyup change', function(event) {
		var tmp_336 = "";

		if ($('#336a').val().length > 0) {
			tmp_336 = tmp_336 + '^a' + $('#336a').val();
		}

		if ($('#336b').val().length > 0) {
			tmp_336 = tmp_336 + '^b' + $('#336b').val();
		}
		
		if (tmp_336.length > 0) {
			$("#336").val('##' + tmp_336);
			$("#l-336").html('##' + tmp_336);
		} else {
			$("#336").val('');
			$("#l-336").html('&nbsp;');
		}
	});
	
	$("#337a").bind('keyup change', function(event) {
		var tmp_337 = "";

		if ($('#337a').val().length > 0) {
			tmp_337 = tmp_337 + '^a' + $('#337a').val();
		}

		if ($('#337b').val().length > 0) {
			tmp_337 = tmp_337 + '^b' + $('#337b').val();
		}
		
		if (tmp_337.length > 0) {
			$("#337").val('##' + tmp_337);
			$("#l-337").html('##' + tmp_337);
		} else {
			$("#337").val('');
			$("#l-337").html('&nbsp;');
		}
	});
	
	$("#337b").bind('keyup change', function(event) {
		var tmp_337 = "";

		if ($('#337a').val().length > 0) {
			tmp_337 = tmp_337 + '^a' + $('#337a').val();
		}

		if ($('#337b').val().length > 0) {
			tmp_337 = tmp_337 + '^b' + $('#337b').val();
		}
		
		if (tmp_337.length > 0) {
			$("#337").val('##' + tmp_337);
			$("#l-337").html('##' + tmp_337);
		} else {
			$("#337").val('');
			$("#l-337").html('&nbsp;');
		}
	});
	$("#340a").bind('keyup change', function(event) {
		var tmp_340 = "";

		if ($('#340a').val().length > 0) {
			tmp_340 = tmp_340 + '^a' + $('#340a').val();
		}

		if ($('#340b').val().length > 0) {
			tmp_340 = tmp_340 + '^b' + $('#340b').val();
		}
		
		if ($('#340c').val().length > 0) {
			tmp_340 = tmp_340 + '^c' + $('#340c').val();
		}

		if ($('#340d').val().length > 0) {
			tmp_340 = tmp_340 + '^d' + $('#340d').val();
		}
		
		if ($('#340e').val().length > 0) {
			tmp_340 = tmp_340 + '^e' + $('#340e').val();
		}
		if (tmp_340.length > 0) {
			$("#340").val('##' + tmp_340);
			$("#l-340").html('##' + tmp_340);
		} else {
			$("#340").val('');
			$("#l-340").html('&nbsp;');
		}
	});
	
	$("#340b").bind('keyup change', function(event) {
		var tmp_340 = "";

		if ($('#340a').val().length > 0) {
			tmp_340 = tmp_340 + '^a' + $('#340a').val();
		}

		if ($('#340b').val().length > 0) {
			tmp_340 = tmp_340 + '^b' + $('#340b').val();
		}
		
		if ($('#340c').val().length > 0) {
			tmp_340 = tmp_340 + '^c' + $('#340c').val();
		}

		if ($('#340d').val().length > 0) {
			tmp_340 = tmp_340 + '^d' + $('#340d').val();
		}
		
		if ($('#340e').val().length > 0) {
			tmp_340 = tmp_340 + '^e' + $('#340e').val();
		}
		if (tmp_340.length > 0) {
			$("#340").val('##' + tmp_340);
			$("#l-340").html('##' + tmp_340);
		} else {
			$("#340").val('');
			$("#l-340").html('&nbsp;');
		}
	});
	
	$("#340c").bind('keyup change', function(event) {
		var tmp_340 = "";

		if ($('#340a').val().length > 0) {
			tmp_340 = tmp_340 + '^a' + $('#340a').val();
		}

		if ($('#340b').val().length > 0) {
			tmp_340 = tmp_340 + '^b' + $('#340b').val();
		}
		
		if ($('#340c').val().length > 0) {
			tmp_340 = tmp_340 + '^c' + $('#340c').val();
		}

		if ($('#340d').val().length > 0) {
			tmp_340 = tmp_340 + '^d' + $('#340d').val();
		}
		
		if ($('#340e').val().length > 0) {
			tmp_340 = tmp_340 + '^e' + $('#340e').val();
		}
		if (tmp_340.length > 0) {
			$("#340").val('##' + tmp_340);
			$("#l-340").html('##' + tmp_340);
		} else {
			$("#340").val('');
			$("#l-340").html('&nbsp;');
		}
	});
	
	$("#340d").bind('keyup change', function(event) {
		var tmp_340 = "";

		if ($('#340a').val().length > 0) {
			tmp_340 = tmp_340 + '^a' + $('#340a').val();
		}

		if ($('#340b').val().length > 0) {
			tmp_340 = tmp_340 + '^b' + $('#340b').val();
		}
		
		if ($('#340c').val().length > 0) {
			tmp_340 = tmp_340 + '^c' + $('#340c').val();
		}

		if ($('#340d').val().length > 0) {
			tmp_340 = tmp_340 + '^d' + $('#340d').val();
		}
		
		if ($('#340e').val().length > 0) {
			tmp_340 = tmp_340 + '^e' + $('#340e').val();
		}
		if (tmp_340.length > 0) {
			$("#340").val('##' + tmp_340);
			$("#l-340").html('##' + tmp_340);
		} else {
			$("#340").val('');
			$("#l-340").html('&nbsp;');
		}
	});
	
	$("#340e").bind('keyup change', function(event) {
		var tmp_340 = "";

		if ($('#340a').val().length > 0) {
			tmp_340 = tmp_340 + '^a' + $('#340a').val();
		}

		if ($('#340b').val().length > 0) {
			tmp_340 = tmp_340 + '^b' + $('#340b').val();
		}
		
		if ($('#340c').val().length > 0) {
			tmp_340 = tmp_340 + '^c' + $('#340c').val();
		}

		if ($('#340d').val().length > 0) {
			tmp_340 = tmp_340 + '^d' + $('#340d').val();
		}
		
		if ($('#340e').val().length > 0) {
			tmp_340 = tmp_340 + '^e' + $('#340e').val();
		}
		if (tmp_340.length > 0) {
			$("#340").val('##' + tmp_340);
			$("#l-340").html('##' + tmp_340);
		} else {
			$("#340").val('');
			$("#l-340").html('&nbsp;');
		}
	});
	$("#362a").bind('keyup change', function(event) {
		var tmp_362 = "";

		if ($('#362a').val().length > 0) {
			tmp_362 = tmp_362 + '^a' + $('#362a').val();
		}

		if (tmp_362.length > 0) {
			$("#362").val('0#' + tmp_362);
			$("#l-362").html('0#' + tmp_362);
		} else {
			$("#362").val('');
			$("#l-362").html('&nbsp;');
		}
	});

	$("#380a").bind('keyup change', function(event) {
		var tmp_380 = "";

		if ($('#380a').val().length > 0) {
			tmp_380 = tmp_380 + '^a' + $('#380a').val();
		}

		if (tmp_380.length > 0) {
			$("#380").val('##' + tmp_380);
			$("#l-380").html('##' + tmp_380);
		} else {
			$("#380").val('');
			$("#l-380").html('&nbsp;');
		}
	});
	
	$("#440a").bind('keyup change', function(event) {
		var tmp_440 = "";

		if ($('#440a').val().length > 0) {
			tmp_440 = tmp_440 + '^a' + $('#440a').val();
		}
		if ($('#440n').val().length > 0) {
			tmp_440 = tmp_440 + '^n' + $('#440n').val();
		}
		if ($('#440p').val().length > 0) {
			tmp_440 = tmp_440 + '^p' + $('#440p').val();
		}
		if ($('#440x').val().length > 0) {
			tmp_440 = tmp_440 + '^x' + $('#440x').val();
		}
		if ($('#440v').val().length > 0) {
			tmp_440 = tmp_440 + '^v' + $('#440v').val();
		}
		if (tmp_440.length > 0) {
			$("#440").val('##' + tmp_440);
			$("#l-440").html('##' + tmp_440);
		} else {
			$("#440").val('');
			$("#l-440").html('&nbsp;');
		}
	});

	$("#440n").bind('keyup change', function(event) {
		var tmp_440 = "";

		if ($('#440a').val().length > 0) {
			tmp_440 = tmp_440 + '^a' + $('#440a').val();
		}
		if ($('#440n').val().length > 0) {
			tmp_440 = tmp_440 + '^n' + $('#440n').val();
		}
		if ($('#440p').val().length > 0) {
			tmp_440 = tmp_440 + '^p' + $('#440p').val();
		}
		if ($('#440x').val().length > 0) {
			tmp_440 = tmp_440 + '^x' + $('#440x').val();
		}
		if ($('#440v').val().length > 0) {
			tmp_440 = tmp_440 + '^v' + $('#440v').val();
		}
		if (tmp_440.length > 0) {
			$("#440").val('##' + tmp_440);
			$("#l-440").html('##' + tmp_440);
		} else {
			$("#440").val('');
			$("#l-440").html('&nbsp;');
		}
	});
	
	$("#440p").bind('keyup change', function(event) {
		var tmp_440 = "";

		if ($('#440a').val().length > 0) {
			tmp_440 = tmp_440 + '^a' + $('#440a').val();
		}
		if ($('#440n').val().length > 0) {
			tmp_440 = tmp_440 + '^n' + $('#440n').val();
		}
		if ($('#440p').val().length > 0) {
			tmp_440 = tmp_440 + '^p' + $('#440p').val();
		}
		if ($('#440x').val().length > 0) {
			tmp_440 = tmp_440 + '^x' + $('#440x').val();
		}
		if ($('#440v').val().length > 0) {
			tmp_440 = tmp_440 + '^v' + $('#440v').val();
		}
		if (tmp_440.length > 0) {
			$("#440").val('##' + tmp_440);
			$("#l-440").html('##' + tmp_440);
		} else {
			$("#440").val('');
			$("#l-440").html('&nbsp;');
		}
	});
	
	$("#440x").bind('keyup change', function(event) {
		var tmp_440 = "";

		if ($('#440a').val().length > 0) {
			tmp_440 = tmp_440 + '^a' + $('#440a').val();
		}
		if ($('#440n').val().length > 0) {
			tmp_440 = tmp_440 + '^n' + $('#440n').val();
		}
		if ($('#440p').val().length > 0) {
			tmp_440 = tmp_440 + '^p' + $('#440p').val();
		}
		if ($('#440x').val().length > 0) {
			tmp_440 = tmp_440 + '^x' + $('#440x').val();
		}
		if ($('#440v').val().length > 0) {
			tmp_440 = tmp_440 + '^v' + $('#440v').val();
		}
		if (tmp_440.length > 0) {
			$("#440").val('##' + tmp_440);
			$("#l-440").html('##' + tmp_440);
		} else {
			$("#440").val('');
			$("#l-440").html('&nbsp;');
		}
	});
	
	$("#440v").bind('keyup change', function(event) {
		var tmp_440 = "";

		if ($('#440a').val().length > 0) {
			tmp_440 = tmp_440 + '^a' + $('#440a').val();
		}
		if ($('#440n').val().length > 0) {
			tmp_440 = tmp_440 + '^n' + $('#440n').val();
		}
		if ($('#440p').val().length > 0) {
			tmp_440 = tmp_440 + '^p' + $('#440p').val();
		}
		if ($('#440x').val().length > 0) {
			tmp_440 = tmp_440 + '^x' + $('#440x').val();
		}
		if ($('#440v').val().length > 0) {
			tmp_440 = tmp_440 + '^v' + $('#440v').val();
		}
		if (tmp_440.length > 0) {
			$("#440").val('##' + tmp_440);
			$("#l-440").html('##' + tmp_440);
		} else {
			$("#440").val('');
			$("#l-440").html('&nbsp;');
		}
	});
	
	$("#490a").bind('keyup change', function(event) {
		var tmp_490 = "";

		if ($('#490a').val().length > 0) {
			tmp_490 = tmp_490 + '^a' + $('#490a').val();
		}
		if ($('#490v').val().length > 0) {
			tmp_490 = tmp_490 + '^v' + $('#490v').val();
		}
		if (tmp_490.length > 0) {
			$("#490").val('##' + tmp_490);
			$("#l-490").html('##' + tmp_490);
		} else {
			$("#490").val('');
			$("#l-490").html('&nbsp;');
		}
	});
	
	$("#490v").bind('keyup change', function(event) {
		var tmp_490= "";

		if ($('#490a').val().length > 0) {
			tmp_490 = tmp_490 + '^a' + $('#490a').val();
		}
		if ($('#490v').val().length > 0) {
			tmp_490 = tmp_490 + '^v' + $('#490v').val();
		}
		if (tmp_490.length > 0) {
			$("#490").val('##' + tmp_490);
			$("#l-490").html('##' + tmp_490);
		} else {
			$("#490").val('');
			$("#l-490").html('&nbsp;');
		}
	});
	$("#500a").bind('keyup change', function(event) {
		var tmp_500 = "";

		if ($('#500a').val().length > 0) {
			tmp_500 = tmp_500 + '^a' + $('#500a').val();
		}

		if (tmp_500.length > 0) {
			$("#500").val('##' + tmp_500);
			$("#l-500").html('##' + tmp_500);
		} else {
			$("#500").val('');
			$("#l-500").html('&nbsp;');
		}
	});

	$("#501a").bind('keyup change', function(event) {
		var tmp_501 = "";

		if ($('#501a').val().length > 0) {
			tmp_501 = tmp_501 + '^a' + $('#501a').val();
		}
		
		if (tmp_501.length > 0) {
			$("#501").val('##' + tmp_501);
			$("#l-501").html('##' + tmp_501);
		} else {
			$("#501").val('');
			$("#l-501").html('&nbsp;');
		}
	});

	$("#505i1").change(function(event) {
		var tmp_505 = "";

		if ($('#505a').val().length > 0) {
			tmp_505 = tmp_505 + '^a' + $('#505a').val();
		}
		if ($('#505t').val().length > 0) {
			tmp_505 = tmp_505 + '^t' + $('#505t').val();
		}
		if ($('#505r').val().length > 0) {
			tmp_505 = tmp_505 + 'r' + $('#505r').val();
		}
		if (tmp_505.length > 0) {
			$("#505").val($("#505i1").val() + $("#505i2").val() + tmp_505);
			$("#l-505").html($("#505i1").val() + $("#505i2").val() + tmp_505);
		} else {
			$("#505").val('');
			$("#l-505").html('&nbsp;');
		}
	});

	$("#505i2").change(function(event) {
		var tmp_505 = "";

		if ($('#505a').val().length > 0) {
			tmp_505 = tmp_505 + '^a' + $('#505a').val();
		}
		if ($('#505t').val().length > 0) {
			tmp_505 = tmp_505 + '^t' + $('#505t').val();
		}
		if ($('#505r').val().length > 0) {
			tmp_505 = tmp_505 + 'r' + $('#505r').val();
		}
		if (tmp_505.length > 0) {
			$("#505").val($("#505i1").val() + $("#505i2").val() + tmp_505);
			$("#l-505").html($("#505i1").val() + $("#505i2").val() + tmp_505);
		} else {
			$("#505").val('');
			$("#l-505").html('&nbsp;');
		}
	});

	$("#505a").bind('keyup change', function(event) {
		var tmp_505 = "";

		if ($('#505a').val().length > 0) {
			tmp_505 = tmp_505 + '^a' + $('#505a').val();
		}
		if ($('#505t').val().length > 0) {
			tmp_505 = tmp_505 + '^t' + $('#505t').val();
		}
		if ($('#505r').val().length > 0) {
			tmp_505 = tmp_505 + 'r' + $('#505r').val();
		}
		if (tmp_505.length > 0) {
			$("#505").val($("#505i1").val() + $("#505i2").val() + tmp_505);
			$("#l-505").html($("#505i1").val() + $("#505i2").val() + tmp_505);
		} else {
			$("#505").val('');
			$("#l-505").html('&nbsp;');
		}
	});
	$("#505t").bind('keyup change', function(event) {
		var tmp_505 = "";

		if ($('#505a').val().length > 0) {
			tmp_505 = tmp_505 + '^a' + $('#505a').val();
		}
		if ($('#505t').val().length > 0) {
			tmp_505 = tmp_505 + '^t' + $('#505t').val();
		}
		if ($('#505r').val().length > 0) {
			tmp_505 = tmp_505 + 'r' + $('#505r').val();
		}
		if (tmp_505.length > 0) {
			$("#505").val($("#505i1").val() + $("#505i2").val() + tmp_505);
			$("#l-505").html($("#505i1").val() + $("#505i2").val() + tmp_505);
		} else {
			$("#505").val('');
			$("#l-505").html('&nbsp;');
		}
	});
	$("#505r").bind('keyup change', function(event) {
		var tmp_505 = "";

		if ($('#505a').val().length > 0) {
			tmp_505 = tmp_505 + '^a' + $('#505a').val();
		}
		if ($('#505t').val().length > 0) {
			tmp_505 = tmp_505 + '^t' + $('#505t').val();
		}
		if ($('#505r').val().length > 0) {
			tmp_505 = tmp_505 + 'r' + $('#505r').val();
		}
		if (tmp_505.length > 0) {
			$("#505").val($("#505i1").val() + $("#505i2").val() + tmp_505);
			$("#l-505").html($("#505i1").val() + $("#505i2").val() + tmp_505);
		} else {
			$("#505").val('');
			$("#l-505").html('&nbsp;');
		}
	});

	$("#510i1").change(function(event) {
		var tmp_510 = "";

		if ($('#510a').val().length > 0) {
			tmp_510 = tmp_510 + '^a' + $('#510a').val();
		}

		if ($('#510c').val().length > 0) {
			tmp_510 = tmp_510 + '^c' + $('#510c').val();
		}
		
		if (tmp_510.length > 0) {
			$("#510").val($("#510i1").val() + $("#510i2").val() + tmp_510);
			$("#l-510").html($("#510i1").val() + $("#510i2").val() + tmp_510);
		} else {
			$("#510").val('');
			$("#l-510").html('&nbsp;');
		}
	});

	$("#510i2").change(function(event) {
		var tmp_510 = "";

		if ($('#510a').val().length > 0) {
			tmp_510 = tmp_510 + '^a' + $('#510a').val();
		}

		if ($('#510c').val().length > 0) {
			tmp_510 = tmp_510 + '^c' + $('#510c').val();
		}
		
		if (tmp_510.length > 0) {
			$("#510").val($("#510i1").val() + $("#510i2").val() + tmp_510);
			$("#l-510").html($("#510i1").val() + $("#510i2").val() + tmp_510);
		} else {
			$("#510").val('');
			$("#l-510").html('&nbsp;');
		}
	});

	$("#510a").bind('keyup change', function(event) {
		var tmp_510 = "";

		if ($('#510a').val().length > 0) {
			tmp_510 = tmp_510 + '^a' + $('#510a').val();
		}

		if ($('#510c').val().length > 0) {
			tmp_510 = tmp_510 + '^c' + $('#510c').val();
		}
		
		if (tmp_510.length > 0) {
			$("#510").val($("#510i1").val() + $("#510i2").val() + tmp_510);
			$("#l-510").html($("#510i1").val() + $("#510i2").val() + tmp_510);
		} else {
			$("#510").val('');
			$("#l-510").html('&nbsp;');
		}
	});

	$("#510c").bind('keyup change', function(event) {
		var tmp_510 = "";

		if ($('#510a').val().length > 0) {
			tmp_510 = tmp_510 + '^a' + $('#510a').val();
		}

		if ($('#510c').val().length > 0) {
			tmp_510 = tmp_510 + '^c' + $('#510c').val();
		}
		
		if (tmp_510.length > 0) {
			$("#510").val($("#510i1").val() + $("#510i2").val() + tmp_510);
			$("#l-510").html($("#510i1").val() + $("#510i2").val() + tmp_510);
		} else {
			$("#510").val('');
			$("#l-510").html('&nbsp;');
		}
	});

	$("#511i1").bind('keyup change', function(event) {
		var tmp_511 = "";

		if ($('#511a').val().length > 0) {
			tmp_511 = tmp_511 + '^a' + $('#511a').val();
		}
		
		if (tmp_511.length > 0) {
			$("#511").val($("#511i1").val() + $("#511i2").val() + tmp_511);
			$("#l-511").html($("#511i1").val() + $("#511i2").val() + tmp_511);
		} else {
			$("#511").val('');
			$("#l-511").html('&nbsp;');
		}
	});
		$("#511i2").bind('keyup change', function(event) {
		var tmp_511 = "";

		if ($('#511a').val().length > 0) {
			tmp_511 = tmp_511 + '^a' + $('#511a').val();
		}
		
		if (tmp_511.length > 0) {
			$("#511").val($("#511i1").val() + $("#511i2").val() + tmp_511);
			$("#l-511").html($("#511i1").val() + $("#511i2").val() + tmp_511);
		} else {
			$("#511").val('');
			$("#l-511").html('&nbsp;');
		}
	});
	$("#511a").bind('keyup change', function(event) {
		var tmp_511 = "";

		if ($('#511a').val().length > 0) {
			tmp_511 = tmp_511 + '^a' + $('#511a').val();
		}
		
		if (tmp_511.length > 0) {
			$("#511").val($("#511i1").val() + $("#511i2").val() + tmp_511);
			$("#l-511").html($("#511i1").val() + $("#511i2").val() + tmp_511);
		} else {
			$("#511").val('');
			$("#l-511").html('&nbsp;');
		}
	});
	
	$("#515a").bind('keyup change', function(event) {
		var tmp_515 = "";

		if ($('#515a').val().length > 0) {
			tmp_515 = tmp_515 + '^a' + $('#515a').val();
		}

		if (tmp_515.length > 0) {
			$("#515").val('##' + tmp_515);
			$("#l-515").html('##' + tmp_515);
		} else {
			$("#515").val('');
			$("#l-515").html('&nbsp;');
		}
	});

	$("#520i1").change(function(event) {
		var tmp_520 = "";

		if ($('#520a').val().length > 0) {
			tmp_520 = tmp_520 + '^a' + $('#520a').val();
		}
		if ($('#520b').val().length > 0) {
			tmp_520 = tmp_520 + '^b' + $('#520b').val();
		}
		if (tmp_520.length > 0) {
			$("#520").val($("#520i1").val() + $("#520i2").val() + tmp_520);
			$("#l-520").html($("#520i1").val() + $("#520i2").val() + tmp_520);
		} else {
			$("#520").val('');
			$("#l-520").html('&nbsp;');
		}
	});

	$("#520i2").change(function(event) {
		var tmp_520 = "";

		if ($('#520a').val().length > 0) {
			tmp_520 = tmp_520 + '^a' + $('#520a').val();
		}
		if ($('#520b').val().length > 0) {
			tmp_520 = tmp_520 + '^b' + $('#520b').val();
		}
		if (tmp_520.length > 0) {
			$("#520").val($("#520i1").val() + $("#520i2").val() + tmp_520);
			$("#l-520").html($("#520i1").val() + $("#520i2").val() + tmp_520);
		} else {
			$("#520").val('');
			$("#l-520").html('&nbsp;');
		}
	});

	$("#520a").bind('keyup change', function(event) {
		var tmp_520 = "";

		if ($('#520a').val().length > 0) {
			tmp_520 = tmp_520 + '^a' + $('#520a').val();
		}
		if ($('#520b').val().length > 0) {
			tmp_520 = tmp_520 + '^b' + $('#520b').val();
		}
		if (tmp_520.length > 0) {
			$("#520").val($("#520i1").val() + $("#520i2").val() + tmp_520);
			$("#l-520").html($("#520i1").val() + $("#520i2").val() + tmp_520);
		} else {
			$("#520").val('');
			$("#l-520").html('&nbsp;');
		}
	});
	$("#520b").bind('keyup change', function(event) {
		var tmp_520 = "";

		if ($('#520a').val().length > 0) {
			tmp_520 = tmp_520 + '^a' + $('#520a').val();
		}
		if ($('#520b').val().length > 0) {
			tmp_520 = tmp_520 + '^b' + $('#520b').val();
		}
		if (tmp_520.length > 0) {
			$("#520").val($("#520i1").val() + $("#520i2").val() + tmp_520);
			$("#l-520").html($("#520i1").val() + $("#520i2").val() + tmp_520);
		} else {
			$("#520").val('');
			$("#l-520").html('&nbsp;');
		}
	});
	
	$("#521a").bind('keyup change', function(event) {
		var tmp_521 = "";

		if ($('#521a').val().length > 0) {
			tmp_521 = tmp_521 + '^a' + $('#521a').val();
		}
		if (tmp_521.length > 0) {
			$("#521").val('##' + tmp_521);
			$("#l-521").html('##' + tmp_521);
		} else {
			$("#521").val('');
			$("#l-521").html('&nbsp;');
		}
	});
	
	$("#530a").bind('keyup change', function(event) {
		var tmp_530 = "";

		if ($('#530a').val().length > 0) {
			tmp_530 = tmp_530 + '^a' + $('#530a').val();
		}

		if ($('#530c').val().length > 0) {
			tmp_530 = tmp_530 + '^c' + $('#530c').val();
		}

		if ($('#530u').val().length > 0) {
			tmp_530 = tmp_530 + '^u' + $('#530u').val();
		}
		
		if (tmp_530.length > 0) {
			$("#530").val('##' + tmp_530);
			$("#l-530").html('##' + tmp_530);
		} else {
			$("#530").val('');
			$("#l-530").html('&nbsp;');
		}
	});

	$("#530c").bind('keyup change', function(event) {
		var tmp_530 = "";

		if ($('#530a').val().length > 0) {
			tmp_530 = tmp_530 + '^a' + $('#530a').val();
		}

		if ($('#530c').val().length > 0) {
			tmp_530 = tmp_530 + '^c' + $('#530c').val();
		}

		if ($('#530u').val().length > 0) {
			tmp_530 = tmp_530 + '^u' + $('#530u').val();
		}
		
		if (tmp_530.length > 0) {
			$("#530").val('##' + tmp_530);
			$("#l-530").html('##' + tmp_530);
		} else {
			$("#530").val('');
			$("#l-530").html('&nbsp;');
		}
	});

	$("#530u").bind('keyup change', function(event) {
		var tmp_530 = "";

		if ($('#530a').val().length > 0) {
			tmp_530 = tmp_530 + '^a' + $('#530a').val();
		}

		if ($('#530c').val().length > 0) {
			tmp_530 = tmp_530 + '^c' + $('#530c').val();
		}

		if ($('#530u').val().length > 0) {
			tmp_530 = tmp_530 + '^u' + $('#530u').val();
		}
		
		if (tmp_530.length > 0) {
			$("#530").val('##' + tmp_530);
			$("#l-530").html('##' + tmp_530);
		} else {
			$("#530").val('');
			$("#l-530").html('&nbsp;');
		}
	});

	$("#534a").bind('keyup change', function(event) {
		var tmp_534 = "";

		if ($('#534a').val().length > 0) {
			tmp_534 = tmp_534 + '^a' + $('#534a').val();
		}

		if ($('#534c').val().length > 0) {
			tmp_534 = tmp_534 + '^c' + $('#534c').val();
		}

		if ($('#534l').val().length > 0) {
			tmp_534 = tmp_534 + '^l' + $('#534l').val();
		}

		if ($('#534p').val().length > 0) {
			tmp_534 = tmp_534 + '^p' + $('#534p').val();
		}
		
		if (tmp_534.length > 0) {
			$("#534").val('##' + tmp_534);
			$("#l-534").html('##' + tmp_534);
		} else {
			$("#534").val('');
			$("#l-534").html('&nbsp;');
		}
	});

	$("#534c").bind('keyup change', function(event) {
		var tmp_534 = "";

		if ($('#534a').val().length > 0) {
			tmp_534 = tmp_534 + '^a' + $('#534a').val();
		}

		if ($('#534c').val().length > 0) {
			tmp_534 = tmp_534 + '^c' + $('#534c').val();
		}

		if ($('#534l').val().length > 0) {
			tmp_534 = tmp_534 + '^l' + $('#534l').val();
		}

		if ($('#534p').val().length > 0) {
			tmp_534 = tmp_534 + '^p' + $('#534p').val();
		}
		
		if (tmp_534.length > 0) {
			$("#534").val('##' + tmp_534);
			$("#l-534").html('##' + tmp_534);
		} else {
			$("#534").val('');
			$("#l-534").html('&nbsp;');
		}
	});

	$("#534l").bind('keyup change', function(event) {
		var tmp_534 = "";

		if ($('#534a').val().length > 0) {
			tmp_534 = tmp_534 + '^a' + $('#534a').val();
		}

		if ($('#534c').val().length > 0) {
			tmp_534 = tmp_534 + '^c' + $('#534c').val();
		}

		if ($('#534l').val().length > 0) {
			tmp_534 = tmp_534 + '^l' + $('#534l').val();
		}

		if ($('#534p').val().length > 0) {
			tmp_534 = tmp_534 + '^p' + $('#534p').val();
		}
		
		if (tmp_534.length > 0) {
			$("#534").val('##' + tmp_534);
			$("#l-534").html('##' + tmp_534);
		} else {
			$("#534").val('');
			$("#l-534").html('&nbsp;');
		}
	});

	$("#534p").bind('keyup change', function(event) {
		var tmp_534 = "";

		if ($('#534a').val().length > 0) {
			tmp_534 = tmp_534 + '^a' + $('#534a').val();
		}

		if ($('#534c').val().length > 0) {
			tmp_534 = tmp_534 + '^c' + $('#534c').val();
		}

		if ($('#534l').val().length > 0) {
			tmp_534 = tmp_534 + '^l' + $('#534l').val();
		}

		if ($('#534p').val().length > 0) {
			tmp_534 = tmp_534 + '^p' + $('#534p').val();
		}
		
		if (tmp_534.length > 0) {
			$("#534").val('##' + tmp_534);
			$("#l-534").html('##' + tmp_534);
		} else {
			$("#534").val('');
			$("#l-534").html('&nbsp;');
		}
	});

	$("#546a").bind('keyup change', function(event) {
		var tmp_546 = "";

		if ($('#546a').val().length > 0) {
			tmp_546 = tmp_546 + '^a' + $('#546a').val();
		}

		if ($('#546c').val().length > 0) {
			tmp_546 = tmp_546 + '^c' + $('#546c').val();
		}
		
		if (tmp_546.length > 0) {
			$("#546").val('##' + tmp_546);
			$("#l-546").html('##' + tmp_546);
		} else {
			$("#546").val('');
			$("#l-546").html('&nbsp;');
		}
	});

	$("#546c").bind('keyup change', function(event) {
		var tmp_546 = "";

		if ($('#546a').val().length > 0) {
			tmp_546 = tmp_546 + '^a' + $('#546a').val();
		}

		if ($('#546c').val().length > 0) {
			tmp_546 = tmp_546 + '^c' + $('#546c').val();
		}
		
		if (tmp_546.length > 0) {
			$("#546").val('##' + tmp_546);
			$("#l-546").html('##' + tmp_546);
		} else {
			$("#546").val('');
			$("#l-546").html('&nbsp;');
		}
	});

	$("#555a").bind('keyup change', function(event) {
		var tmp_555 = "";

		if ($('#555a').val().length > 0) {
			tmp_555 = tmp_555 + '^a' + $('#555a').val();
		}

		if ($('#555b').val().length > 0) {
			tmp_555 = tmp_555 + '^b' + $('#555b').val();
		}

		if ($('#555d').val().length > 0) {
			tmp_555 = tmp_555 + '^d' + $('#555d').val();
		}

		if ($('#555u').val().length > 0) {
			tmp_555 = tmp_555 + '^u' + $('#555u').val();
		}
		
		if (tmp_555.length > 0) {
			$("#555").val('##' + tmp_555);
			$("#l-555").html('##' + tmp_555);
		} else {
			$("#555").val('');
			$("#l-555").html('&nbsp;');
		}
	});

	$("#555b").bind('keyup change', function(event) {
		var tmp_555 = "";

		if ($('#555a').val().length > 0) {
			tmp_555 = tmp_555 + '^a' + $('#555a').val();
		}

		if ($('#555b').val().length > 0) {
			tmp_555 = tmp_555 + '^b' + $('#555b').val();
		}

		if ($('#555d').val().length > 0) {
			tmp_555 = tmp_555 + '^d' + $('#555d').val();
		}

		if ($('#555u').val().length > 0) {
			tmp_555 = tmp_555 + '^u' + $('#555u').val();
		}
		
		if (tmp_555.length > 0) {
			$("#555").val('##' + tmp_555);
			$("#l-555").html('##' + tmp_555);
		} else {
			$("#555").val('');
			$("#l-555").html('&nbsp;');
		}
	});

	$("#555d").bind('keyup change', function(event) {
		var tmp_555 = "";

		if ($('#555a').val().length > 0) {
			tmp_555 = tmp_555 + '^a' + $('#555a').val();
		}

		if ($('#555b').val().length > 0) {
			tmp_555 = tmp_555 + '^b' + $('#555b').val();
		}

		if ($('#555d').val().length > 0) {
			tmp_555 = tmp_555 + '^d' + $('#555d').val();
		}

		if ($('#555u').val().length > 0) {
			tmp_555 = tmp_555 + '^u' + $('#555u').val();
		}
		
		if (tmp_555.length > 0) {
			$("#555").val('##' + tmp_555);
			$("#l-555").html('##' + tmp_555);
		} else {
			$("#555").val('');
			$("#l-555").html('&nbsp;');
		}
	});

	$("#555u").bind('keyup change', function(event) {
		var tmp_555 = "";

		if ($('#555a').val().length > 0) {
			tmp_555 = tmp_555 + '^a' + $('#555a').val();
		}

		if ($('#555b').val().length > 0) {
			tmp_555 = tmp_555 + '^b' + $('#555b').val();
		}

		if ($('#555d').val().length > 0) {
			tmp_555 = tmp_555 + '^d' + $('#555d').val();
		}

		if ($('#555u').val().length > 0) {
			tmp_555 = tmp_555 + '^u' + $('#555u').val();
		}
		
		if (tmp_555.length > 0) {
			$("#555").val('##' + tmp_555);
			$("#l-555").html('##' + tmp_555);
		} else {
			$("#555").val('');
			$("#l-555").html('&nbsp;');
		}
	});

	$("#588a").bind('keyup change', function(event) {
		var tmp_588 = "";

		if ($('#588a').val().length > 0) {
			tmp_588 = tmp_588 + '^a' + $('#588a').val();
		}
		
		if (tmp_588.length > 0) {
			$("#588").val('##' + tmp_588);
			$("#l-588").html('##' + tmp_588);
		} else {
			$("#588").val('');
			$("#l-588").html('&nbsp;');
		}
	});
	
	$("#590a").bind('keyup change', function(event) {
		var tmp_590 = "";

		if ($('#590a').val().length > 0) {
			tmp_590 = tmp_590 + '^a' + $('#590a').val();
		}
		
		if (tmp_590.length > 0) {
			$("#590").val('##' + tmp_590);
			$("#l-590").html('##' + tmp_590);
		} else {
			$("#590").val('');
			$("#l-590").html('&nbsp;');
		}
	});
	$("#5922b").bind('keyup change', function(event) {
		var tmp_5922 = "";

		if ($('#5922b').val().length > 0) {
			tmp_5922 = tmp_5922 + '^b' + $('#5922b').val();
		}
		if ($('#5922c').val().length > 0) {
			tmp_5922 = tmp_5922 + '^c' + $('#5922c').val();
		}
		if ($('#5922f').val().length > 0) {
			tmp_5922 = tmp_5922 + '^f' + $('#5922f').val();
		}
		if ($('#5922g').val().length > 0) {
			tmp_5922 = tmp_5922 + '^g' + $('#5922g').val();
		}
		if (tmp_5922.length > 0) {
			$("#5922").val('##' + tmp_5922);
			$("#l-5922").html('##' + tmp_5922);
		} else {
			$("#5922").val('');
			$("#l-5922").html('&nbsp;');
		}
	});
	$("#5922c").bind('keyup change', function(event) {
		var tmp_5922 = "";

		if ($('#5922b').val().length > 0) {
			tmp_5922 = tmp_5922 + '^b' + $('#5922b').val();
		}
		if ($('#5922c').val().length > 0) {
			tmp_5922 = tmp_5922 + '^c' + $('#5922c').val();
		}
		if ($('#5922f').val().length > 0) {
			tmp_5922 = tmp_5922 + '^f' + $('#5922f').val();
		}
		if ($('#5922g').val().length > 0) {
			tmp_5922 = tmp_5922 + '^g' + $('#5922g').val();
		}
		if (tmp_5922.length > 0) {
			$("#5922").val('##' + tmp_5922);
			$("#l-5922").html('##' + tmp_5922);
		} else {
			$("#5922").val('');
			$("#l-5922").html('&nbsp;');
		}
	});
	$("#5922f").bind('keyup change', function(event) {
		var tmp_5922 = "";

		if ($('#5922b').val().length > 0) {
			tmp_5922 = tmp_5922 + '^b' + $('#5922b').val();
		}
		if ($('#5922c').val().length > 0) {
			tmp_5922 = tmp_5922 + '^c' + $('#5922c').val();
		}
		if ($('#5922f').val().length > 0) {
			tmp_5922 = tmp_5922 + '^f' + $('#5922f').val();
		}
		if ($('#5922g').val().length > 0) {
			tmp_5922 = tmp_5922 + '^g' + $('#5922g').val();
		}
		if (tmp_5922.length > 0) {
			$("#5922").val('##' + tmp_5922);
			$("#l-5922").html('##' + tmp_5922);
		} else {
			$("#5922").val('');
			$("#l-5922").html('&nbsp;');
		}
	});
	$("#5922g").bind('keyup change', function(event) {
		var tmp_5922 = "";

		if ($('#5922b').val().length > 0) {
			tmp_5922 = tmp_5922 + '^b' + $('#5922b').val();
		}
		if ($('#5922c').val().length > 0) {
			tmp_5922 = tmp_5922 + '^c' + $('#5922c').val();
		}
		if ($('#592f').val().length > 0) {
			tmp_5922 = tmp_5922 + '^f' + $('#5922f').val();
		}
		if ($('#5922g').val().length > 0) {
			tmp_5922 = tmp_5922 + '^g' + $('#5922g').val();
		}
		if (tmp_5922.length > 0) {
			$("#5922").val('##' + tmp_5922);
			$("#l-5922").html('##' + tmp_5922);
		} else {
			$("#5922").val('');
			$("#l-5922").html('&nbsp;');
		}
	});

	$("#600i1").change(function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});

	$("#600i2").change(function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});
	
	$("#600a").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});

	$("#600d").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});

	$("#600c").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});

	$("#600e").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});

	$("#600v").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});

	$("#600x").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});

	$("#600y").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});

	$("#600z").bind('keyup change', function(event) {
		var tmp_600 = "";

		if ($('#600a').val().length > 0) {
			tmp_600 = tmp_600 + '^a' + $('#600a').val();
		}

		if ($('#600d').val().length > 0) {
			tmp_600 = tmp_600 + '^d' + $('#600d').val();
		}

		if ($('#600c').val().length > 0) {
			tmp_600 = tmp_600 + '^c' + $('#600c').val();
		}

		if ($('#600e').val().length > 0) {
			tmp_600 = tmp_600 + '^e' + $('#600e').val();
		}

		if ($('#600v').val().length > 0) {
			tmp_600 = tmp_600 + '^v' + $('#600v').val();
		}

		if ($('#600x').val().length > 0) {
			tmp_600 = tmp_600 + '^x' + $('#600x').val();
		}

		if ($('#600y').val().length > 0) {
			tmp_600 = tmp_600 + '^y' + $('#600y').val();
		}

		if ($('#600z').val().length > 0) {
			tmp_600 = tmp_600 + '^z' + $('#600z').val();
		}
		
		if (tmp_600.length > 0) {
			$("#600").val($("#600i1").val() + $("#600i2").val() + tmp_600);
			$("#l-600").html($("#600i1").val() + $("#600i2").val() + tmp_600);
		} else {
			$("#600").val('');
			$("#l-600").html('&nbsp;');
		}
	});

	$("#610i1").change(function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610i2").change(function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});
	
	$("#610a").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610b").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610e").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610v").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610x").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610y").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#610z").bind('keyup change', function(event) {
		var tmp_610 = "";

		if ($('#610a').val().length > 0) {
			tmp_610 = tmp_610 + '^a' + $('#610a').val();
		}

		if ($('#610b').val().length > 0) {
			tmp_610 = tmp_610 + '^b' + $('#610b').val();
		}

		if ($('#610e').val().length > 0) {
			tmp_610 = tmp_610 + '^e' + $('#610e').val();
		}

		if ($('#610v').val().length > 0) {
			tmp_610 = tmp_610 + '^v' + $('#610v').val();
		}

		if ($('#610x').val().length > 0) {
			tmp_610 = tmp_610 + '^x' + $('#610x').val();
		}

		if ($('#610y').val().length > 0) {
			tmp_610 = tmp_610 + '^y' + $('#610y').val();
		}

		if ($('#610z').val().length > 0) {
			tmp_610 = tmp_610 + '^z' + $('#610z').val();
		}
		
		if (tmp_610.length > 0) {
			$("#610").val($("#610i1").val() + $("#610i2").val() + tmp_610);
			$("#l-610").html($("#610i1").val() + $("#610i2").val() + tmp_610);
		} else {
			$("#610").val('');
			$("#l-610").html('&nbsp;');
		}
	});

	$("#650i1").change(function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650i2").change(function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650a").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});
	
	$("#650a").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650v").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650x").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650y").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#650z").bind('keyup change', function(event) {
		var tmp_650 = "";

		if ($('#650a').val().length > 0) {
			tmp_650 = tmp_650 + '^a' + $('#650a').val();
		}

		if ($('#650v').val().length > 0) {
			tmp_650 = tmp_650 + '^v' + $('#650v').val();
		}

		if ($('#650x').val().length > 0) {
			tmp_650 = tmp_650 + '^x' + $('#650x').val();
		}

		if ($('#650y').val().length > 0) {
			tmp_650 = tmp_650 + '^y' + $('#650y').val();
		}

		if ($('#650z').val().length > 0) {
			tmp_650 = tmp_650 + '^z' + $('#650z').val();
		}
		
		if (tmp_650.length > 0) {
			$("#650").val($("#650i1").val() + $("#650i2").val() + tmp_650);
			$("#l-650").html($("#650i1").val() + $("#650i2").val() + tmp_650);
		} else {
			$("#650").val('');
			$("#l-650").html('&nbsp;');
		}
	});

	$("#651i1").change(function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651i2").change(function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651a").bind('keyup change', function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651v").bind('keyup change', function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651x").bind('keyup change', function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651y").bind('keyup change', function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#651z").bind('keyup change', function(event) {
		var tmp_651 = "";

		if ($('#651a').val().length > 0) {
			tmp_651 = tmp_651 + '^a' + $('#651a').val();
		}

		if ($('#651v').val().length > 0) {
			tmp_651 = tmp_651 + '^v' + $('#651v').val();
		}

		if ($('#651x').val().length > 0) {
			tmp_651 = tmp_651 + '^x' + $('#651x').val();
		}

		if ($('#651y').val().length > 0) {
			tmp_651 = tmp_651 + '^y' + $('#651y').val();
		}

		if ($('#651z').val().length > 0) {
			tmp_651 = tmp_651 + '^z' + $('#651z').val();
		}
		
		if (tmp_651.length > 0) {
			$("#651").val($("#651i1").val() + $("#651i2").val() + tmp_651);
			$("#l-651").html($("#651i1").val() + $("#651i2").val() + tmp_651);
		} else {
			$("#651").val('');
			$("#l-651").html('&nbsp;');
		}
	});

	$("#653i1").change(function(event) {
		var tmp_653 = "";

		if ($('#653a').val().length > 0) {
			tmp_653 = tmp_653 + '^a' + $('#653a').val();
		}
		
		if (tmp_653.length > 0) {
			$("#653").val($("#653i1").val() + $("#653i2").val() + tmp_653);
			$("#l-653").html($("#653i1").val() + $("#653i2").val() + tmp_653);
		} else {
			$("#653").val('');
			$("#l-653").html('&nbsp;');
		}
	});

	$("#653i2").change(function(event) {
		var tmp_653 = "";

		if ($('#653a').val().length > 0) {
			tmp_653 = tmp_653 + '^a' + $('#653a').val();
		}
		
		if (tmp_653.length > 0) {
			$("#653").val($("#653i1").val() + $("#653i2").val() + tmp_653);
			$("#l-653").html($("#653i1").val() + $("#653i2").val() + tmp_653);
		} else {
			$("#653").val('');
			$("#l-653").html('&nbsp;');
		}
	});

	$("#653a").bind('keyup change', function(event) {
		var tmp_653 = "";

		if ($('#653a').val().length > 0) {
			tmp_653 = tmp_653 + '^a' + $('#653a').val();
		}
		
		if (tmp_653.length > 0) {
			$("#653").val($("#653i1").val() + $("#653i2").val() + tmp_653);
			$("#l-653").html($("#653i1").val() + $("#653i2").val() + tmp_653);
		} else {
			$("#653").val('');
			$("#l-653").html('&nbsp;');
		}
	});

	$("#690a").bind('keyup change', function(event) {
		var tmp_690 = "";

		if ($('#690a').val().length > 0) {
			tmp_690 = tmp_690 + '^a' + $('#690a').val();
		}
		
		if (tmp_690.length > 0) {
			$("#690").val(tmp_690);
			$("#l-690").html(tmp_690);
		} else {
			$("#690").val('');
			$("#l-690").html('&nbsp;');
		}
	});

	$("#700i1").change(function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700i2").change(function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700a").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700b").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700c").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700d").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700e").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700q").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#700t").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#7004").bind('keyup change', function(event) {
		var tmp_700 = "";

		if ($('#700a').val().length > 0) {
			tmp_700 = tmp_700 + '^a' + $('#700a').val();
		}

		if ($('#700b').val().length > 0) {
			tmp_700 = tmp_700 + '^b' + $('#700b').val();
		}

		if ($('#700c').val().length > 0) {
			tmp_700 = tmp_700 + '^c' + $('#700c').val();
		}

		if ($('#700d').val().length > 0) {
			tmp_700 = tmp_700 + '^d' + $('#700d').val();
		}

		if ($('#700e').val().length > 0) {
			tmp_700 = tmp_700 + '^e' + $('#700e').val();
		}

		if ($('#700q').val().length > 0) {
			tmp_700 = tmp_700 + '^q' + $('#700q').val();
		}

		if ($('#700t').val().length > 0) {
			tmp_700 = tmp_700 + '^t' + $('#700t').val();
		}

		if ($('#7004').val().length > 0) {
			tmp_700 = tmp_700 + '^4' + $('#7004').val();
		}
		
		if (tmp_700.length > 0) {
			$("#700").val($("#700i1").val() + $("#700i2").val() + tmp_700);
			$("#l-700").html($("#700i1").val() + $("#700i2").val() + tmp_700);
		} else {
			$("#700").val('');
			$("#l-700").html('&nbsp;');
		}
	});

	$("#710i1").change(function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#710i2").change(function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#710a").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#710b").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#710e").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#710t").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#7104").bind('keyup change', function(event) {
		var tmp_710 = "";

		if ($('#710a').val().length > 0) {
			tmp_710 = tmp_710 + '^a' + $('#710a').val();
		}

		if ($('#710b').val().length > 0) {
			tmp_710 = tmp_710 + '^b' + $('#710b').val();
		}

		if ($('#710e').val().length > 0) {
			tmp_710 = tmp_710 + '^e' + $('#710e').val();
		}

		if ($('#710t').val().length > 0) {
			tmp_710 = tmp_710 + '^t' + $('#710t').val();
		}

		if ($('#7104').val().length > 0) {
			tmp_710 = tmp_710 + '^4' + $('#7104').val();
		}
		
		if (tmp_710.length > 0) {
			$("#710").val($("#710i1").val() + $("#710i2").val() + tmp_710);
			$("#l-710").html($("#710i1").val() + $("#710i2").val() + tmp_710);
		} else {
			$("#710").val('');
			$("#l-710").html('&nbsp;');
		}
	});

	$("#740i1").change(function(event) {
		var tmp_740 = "";

		if ($('#740a').val().length > 0) {
			tmp_740 = tmp_740 + '^a' + $('#740a').val();
		}

		if ($('#740n').val().length > 0) {
			tmp_740 = tmp_740 + '^n' + $('#740n').val();
		}

		if ($('#740p').val().length > 0) {
			tmp_740 = tmp_740 + '^p' + $('#740p').val();
		}
		
		if (tmp_740.length > 0) {
			$("#740").val($("#740i1").val() + $("#740i2").val() + tmp_740);
			$("#l-740").html($("#740i1").val() + $("#740i2").val() + tmp_740);
		} else {
			$("#740").val('');
			$("#l-740").html('&nbsp;');
		}
	});

	$("#740i2").change(function(event) {
		var tmp_740 = "";

		if ($('#740a').val().length > 0) {
			tmp_740 = tmp_740 + '^a' + $('#740a').val();
		}

		if ($('#740n').val().length > 0) {
			tmp_740 = tmp_740 + '^n' + $('#740n').val();
		}

		if ($('#740p').val().length > 0) {
			tmp_740 = tmp_740 + '^p' + $('#740p').val();
		}
		
		if (tmp_740.length > 0) {
			$("#740").val($("#740i1").val() + $("#740i2").val() + tmp_740);
			$("#l-740").html($("#740i1").val() + $("#740i2").val() + tmp_740);
		} else {
			$("#740").val('');
			$("#l-740").html('&nbsp;');
		}
	});

	$("#740a").bind('keyup change', function(event) {
		var tmp_740 = "";

		if ($('#740a').val().length > 0) {
			tmp_740 = tmp_740 + '^a' + $('#740a').val();
		}

		if ($('#740n').val().length > 0) {
			tmp_740 = tmp_740 + '^n' + $('#740n').val();
		}

		if ($('#740p').val().length > 0) {
			tmp_740 = tmp_740 + '^p' + $('#740p').val();
		}
		
		if (tmp_740.length > 0) {
			$("#740").val($("#740i1").val() + $("#740i2").val() + tmp_740);
			$("#l-740").html($("#740i1").val() + $("#740i2").val() + tmp_740);
		} else {
			$("#740").val('');
			$("#l-740").html('&nbsp;');
		}
	});
	
	$("#740n").bind('keyup change', function(event) {
		var tmp_740 = "";

		if ($('#740a').val().length > 0) {
			tmp_740 = tmp_740 + '^a' + $('#740a').val();
		}

		if ($('#740n').val().length > 0) {
			tmp_740 = tmp_740 + '^n' + $('#740n').val();
		}

		if ($('#740p').val().length > 0) {
			tmp_740 = tmp_740 + '^p' + $('#740p').val();
		}
		
		if (tmp_740.length > 0) {
			$("#740").val($("#740i1").val() + $("#740i2").val() + tmp_740);
			$("#l-740").html($("#740i1").val() + $("#740i2").val() + tmp_740);
		} else {
			$("#740").val('');
			$("#l-740").html('&nbsp;');
		}
	});

	$("#740p").bind('keyup change', function(event) {
		var tmp_740 = "";

		if ($('#740a').val().length > 0) {
			tmp_740 = tmp_740 + '^a' + $('#740a').val();
		}

		if ($('#740n').val().length > 0) {
			tmp_740 = tmp_740 + '^n' + $('#740n').val();
		}

		if ($('#740p').val().length > 0) {
			tmp_740 = tmp_740 + '^p' + $('#740p').val();
		}
		
		if (tmp_740.length > 0) {
			$("#740").val($("#740i1").val() + $("#740i2").val() + tmp_740);
			$("#l-740").html($("#740i1").val() + $("#740i2").val() + tmp_740);
		} else {
			$("#740").val('');
			$("#l-740").html('&nbsp;');
		}
	});

	$("#773i1").change(function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773i2").change(function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773a").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773b").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773d").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773g").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773h").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773k").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773n").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773q").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773t").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#773z").bind('keyup change', function(event) {
		var tmp_773 = "";

		if ($('#773a').val().length > 0) {
			tmp_773 = tmp_773 + '^a' + $('#773a').val();
		}

		if ($('#773b').val().length > 0) {
			tmp_773 = tmp_773 + '^b' + $('#773b').val();
		}

		if ($('#773d').val().length > 0) {
			tmp_773 = tmp_773 + '^d' + $('#773d').val();
		}

		if ($('#773g').val().length > 0) {
			tmp_773 = tmp_773 + '^g' + $('#773g').val();
		}

		if ($('#773h').val().length > 0) {
			tmp_773 = tmp_773 + '^h' + $('#773h').val();
		}

		if ($('#773k').val().length > 0) {
			tmp_773 = tmp_773 + '^k' + $('#773k').val();
		}

		if ($('#773n').val().length > 0) {
			tmp_773 = tmp_773 + '^n' + $('#773n').val();
		}

		if ($('#773q').val().length > 0) {
			tmp_773 = tmp_773 + '^q' + $('#773q').val();
		}

		if ($('#773t').val().length > 0) {
			tmp_773 = tmp_773 + '^t' + $('#773t').val();
		}

		if ($('#773z').val().length > 0) {
			tmp_773 = tmp_773 + '^z' + $('#773z').val();
		}
		
		if (tmp_773.length > 0) {
			$("#773").val($("#773i1").val() + $("#773i2").val() + tmp_773);
			$("#l-773").html($("#773i1").val() + $("#773i2").val() + tmp_773);
		} else {
			$("#773").val('');
			$("#l-773").html('&nbsp;');
		}
	});

	$("#850a").bind('keyup change', function(event) {
		var tmp_850 = "";

		if ($('#850a').val().length > 0) {
			tmp_850 = tmp_850 + '^a' + $('#850a').val();
		}
		
		if (tmp_850.length > 0) {
			$("#850").val('##' + tmp_850);
			$("#l-850").html('##' + tmp_850);
		} else {
			$("#850").val('');
			$("#l-850").html('&nbsp;');
		}
	});

	$("#852i1").change(function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852i2").change(function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852a").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852b").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852c").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852h").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852i").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852j").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852k").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#852m").bind('keyup change', function(event) {
		var tmp_852 = "";

		if ($('#852a').val().length > 0) {
			tmp_852 = tmp_852 + '^a' + $('#852a').val();
		}

		if ($('#852b').val().length > 0) {
			tmp_852 = tmp_852 + '^b' + $('#852b').val();
		}

		if ($('#852c').val().length > 0) {
			tmp_852 = tmp_852 + '^c' + $('#852c').val();
		}

		if ($('#852h').val().length > 0) {
			tmp_852 = tmp_852 + '^h' + $('#852h').val();
		}

		if ($('#852i').val().length > 0) {
			tmp_852 = tmp_852 + '^i' + $('#852i').val();
		}

		if ($('#852j').val().length > 0) {
			tmp_852 = tmp_852 + '^j' + $('#852j').val();
		}

		if ($('#852k').val().length > 0) {
			tmp_852 = tmp_852 + '^k' + $('#852k').val();
		}

		if ($('#852m').val().length > 0) {
			tmp_852 = tmp_852 + '^m' + $('#852m').val();
		}

		if (tmp_852.length > 0) {
			$("#852").val($("#852i1").val() + $("#852i2").val() + tmp_852);
			$("#l-852").html($("#852i1").val() + $("#852i2").val() + tmp_852);
		} else {
			$("#852").val('');
			$("#l-852").html('&nbsp;');
		}
	});

	$("#856i1").change(function(event) {
		var tmp_856 = "";

		if ($('#856a').val().length > 0) {
			tmp_856 = tmp_856 + '^a' + $('#856a').val();
		}

		if ($('#856d').val().length > 0) {
			tmp_856 = tmp_856 + '^d' + $('#856d').val();
		}

		if ($('#856u').val().length > 0) {
			tmp_856 = tmp_856 + '^u' + $('#856u').val();
		}

		if (tmp_856.length > 0) {
			$("#856").val($("#856i1").val() + $("#856i2").val() + tmp_856);
			$("#l-856").html($("#856i1").val() + $("#856i2").val() + tmp_856);
		} else {
			$("#856").val('');
			$("#l-856").html('&nbsp;');
		}
	});

	$("#856i2").change(function(event) {
		var tmp_856 = "";

		if ($('#856a').val().length > 0) {
			tmp_856 = tmp_856 + '^a' + $('#856a').val();
		}

		if ($('#856d').val().length > 0) {
			tmp_856 = tmp_856 + '^d' + $('#856d').val();
		}

		if ($('#856u').val().length > 0) {
			tmp_856 = tmp_856 + '^u' + $('#856u').val();
		}

		if (tmp_856.length > 0) {
			$("#856").val($("#856i1").val() + $("#856i2").val() + tmp_856);
			$("#l-856").html($("#856i1").val() + $("#856i2").val() + tmp_856);
		} else {
			$("#856").val('');
			$("#l-856").html('&nbsp;');
		}
	});

	$("#856a").bind('keyup change', function(event) {
		var tmp_856 = "";

		if ($('#856a').val().length > 0) {
			tmp_856 = tmp_856 + '^a' + $('#856a').val();
		}

		if ($('#856d').val().length > 0) {
			tmp_856 = tmp_856 + '^d' + $('#856d').val();
		}

		if ($('#856u').val().length > 0) {
			tmp_856 = tmp_856 + '^u' + $('#856u').val();
		}

		if (tmp_856.length > 0) {
			$("#856").val($("#856i1").val() + $("#856i2").val() + tmp_856);
			$("#l-856").html($("#856i1").val() + $("#856i2").val() + tmp_856);
		} else {
			$("#856").val('');
			$("#l-856").html('&nbsp;');
		}
	});

	$("#856d").bind('keyup change', function(event) {
		var tmp_856 = "";

		if ($('#856a').val().length > 0) {
			tmp_856 = tmp_856 + '^a' + $('#856a').val();
		}

		if ($('#856d').val().length > 0) {
			tmp_856 = tmp_856 + '^d' + $('#856d').val();
		}

		if ($('#856u').val().length > 0) {
			tmp_856 = tmp_856 + '^u' + $('#856u').val();
		}

		if (tmp_856.length > 0) {
			$("#856").val($("#856i1").val() + $("#856i2").val() + tmp_856);
			$("#l-856").html($("#856i1").val() + $("#856i2").val() + tmp_856);
		} else {
			$("#856").val('');
			$("#l-856").html('&nbsp;');
		}
	});

	$("#856u").bind('keyup change', function(event) {
		var tmp_856 = "";

		if ($('#856a').val().length > 0) {
			tmp_856 = tmp_856 + '^a' + $('#856a').val();
		}

		if ($('#856d').val().length > 0) {
			tmp_856 = tmp_856 + '^d' + $('#856d').val();
		}

		if ($('#856u').val().length > 0) {
			tmp_856 = tmp_856 + '^u' + $('#856u').val();
		}

		if (tmp_856.length > 0) {
			$("#856").val($("#856i1").val() + $("#856i2").val() + tmp_856);
			$("#l-856").html($("#856i1").val() + $("#856i2").val() + tmp_856);
		} else {
			$("#856").val('');
			$("#l-856").html('&nbsp;');
		}
	});

	//-------------- Validaciones ---------------//
	
	// Campos obligatorios vacíos.
	$('#ManuscriptAddForm').submit(function(event) {
		if ($('#031t').val() == ""){
			alert("EL campo 'Íncipit literario' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t0xx').parent().addClass('active');
			$('#0xx').show();
			$('#031t').focus();
			return false;
		}
		
		if ($('#100a').val() == ""){
			alert("EL campo 'Nombre de persona' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t1xx').parent().addClass('active');
			$('#1xx').show();
			$('#100a').focus();
			return false;
		}

		if ($('#245a').val() == ""){
			alert("EL campo 'Mención de título' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#245a').focus();
			return false;
		}

		if ($('#260a').val() == ""){
			alert("EL campo 'Lugar de publicación, distribución, etc.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#260a').focus();
			return false;
		}

		if ($('#260b').val() == ""){
			alert("EL campo 'Nombre del editor, distribuidor, etc.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#260b').focus();
			return false;
		}

		if ($('#260c').val() == ""){
			alert("EL campo 'Fecha de publicación, distribución, etc.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t2xx').parent().addClass('active');
			$('#2xx').show();
			$('#260c').focus();
			return false;
		}
		
		if ($('#5922b').val() == ""){
			alert("EL campo 'Instrumento - Medio sonoro.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t5xx').parent().addClass('active');
			$('#5xx').show();
			$('#5922b').focus();
			return false;
		}
		if ($('#5922c').val() == ""){
			alert("EL campo 'Género - Tempo.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t5xx').parent().addClass('active');
			$('#5xx').show();
			$('#5922c').focus();
			return false;
		}
		if ($('#5922f').val() == ""){
			alert("EL campo 'Armadura de clave - Tonalidad.' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t5xx').parent().addClass('active');
			$('#5xx').show();
			$('#5922f').focus();
			return false;
		}
		/*if ($('#650a').val() == ""){
			alert("EL campo 'Materia.' No puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#650a').focus();
			return false;
		}*/

		if ($('#653a').val() == ""){
			alert("EL campo 'Término de indización – No controlado' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t6xx').parent().addClass('active');
			$('#6xx').show();
			$('#653a').focus();
			return false;

		}
			if ($('#700a').val() == ""){
			alert("EL campo 'Nombre de persona' no puede estar vacío.");
			$(".tabs").hide();
			$('.active').removeClass('active');
			$('#t7xx').parent().addClass('active');
			$('#7xx').show();
			$('#700a').focus();
			return false;

		}
		if ($('#ManuscriptCover').val() == ""){
			alert("Debe seleccionar una portada para la obra.");
			$('#ItemItem').focus();
			return false;
		}

		if ($('#ManuscriptItem').val() == ""){
			alert("Debe seleccionar el archivo o documento de la obra.");
			$('#ItemItem').focus();
			return false;
		}
		
		return true;
	});

	$('#245a').change(function() {
		$.post("<?php echo $this->base; ?>/items/publications/" + $(this).val(), function(data) {
			//publications = data;
			//Actualizar object DOM publications.
		});
	});
});

var authors = <?php echo $authors; ?>;
var titles = <?php echo $titles; ?>;
var places = <?php echo $places; ?>;
var editors = <?php echo $editors; ?>;
var years = <?php echo $years; ?>;
var publications = <?php echo $publications; ?>;
var matters = <?php echo $matters; ?>;
</script>
<?php echo $this->Html->script('autocomplete/jquery.autocomplete.min'); ?>
<?php echo $this->Html->script('autocomplete/currency-autocomplete'); ?>
<script type="text/javascript">
$(document).ready(function() {
	// Ancho del autocompletar.
	$('.autocomplete-suggestions').css('width', '30%');
});
</script>