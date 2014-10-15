<?php
class BooksController extends AppController {

	var $name = 'Books';
	var $components = array('Attachment');
	var $uses = array('Item', 'Search');

	function beforeFilter(){
		parent::beforeFilter();
		// Acciones permitidas sin loguearse.
		$this->Auth->allow(
				'index',
				'view',
				'search',
				'advanced_search',
				'century',
				'year',
				'matter',
				'author',
				'title',
				'marc21',
				'intro'
				/*'libros',
				'revistas',
				'manuscritos',
				'impresos',
				'iconografias',
				'trabajos'*/
		);
		
		//if ($this->Session->read('Auth.User.group_id') == '3'){
			//$this->Session->setFlash(__('Access restricted.', true));
			//$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		//}
	}

	function marc21_decode($camp = null) {
		if (!empty($camp)) {
			$c = explode('^', $camp);
			$indicators = $c[0];
			unset($c[0]);
	
			$i = 0;
			foreach ($c as $v){
				$c[substr($v, 0, 1)] = substr($v, 1, strlen($v)-1);
				$i++;
				unset($c[$i]);
			}
			$c['indicators'] = $indicators;
			return $c;
		} else {
			return false;
		}
	}
	
	function buildConditions ($search){ // Funcion que arma las condiciones para el paginador a partir de el arreglo con los campos de búsqueda.
		if (!empty($search)){
			$conditions = array();
			$conditions['Item.h-006'] = 'a'; // Tipo libro.
			$conditions['Item.h-007'] = 'm'; // Tipo libro.
			
			if (!empty($search['Book']['title'])) {
				$conditions['Item.title LIKE'] = '%' . $search['Book']['title'] . '%';
			}
			
			if (!empty($search['Book']['author_id'])) {
				$conditions['Item.author_id'] = $search['Book']['author_id'];
			}
			
			if (!empty($search['Book']['type_id'])) {
				$conditions['Item.type_id'] = $search['Book']['type_id'];
			}
			
			if (!empty($search['Book']['topic_id'])) {
				$conditions['Item.topic_id'] = $search['Book']['topic_id'];
			}
			
			if (!empty($search['Book']['year'])) {
				$conditions['Item.year'] = $search['Book']['year'];
			}
			
			return $conditions;
		} else {
			return false;
		}
	}
	
	function intro() {
		
	}
	
	function index_old() {
		$conditions = array();
		$this->Item->recursive = 1;
		
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
			
		} else { // Si se viene del home o del paginador ...
			
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}

		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions
		);
		
		$this->set('items', $this->paginate());
		
		//$topics = $this->Item->Topic->find('list');
		//$types = $this->Item->Type->find('list');
		//$authors = $this->Item->Author->find('list', array('fields' => array('id', 'fullname'), 'order' => 'fullname'));
		//$this->set(compact('topics', 'types', 'authors'));
	}
	
	function index() {
		if (!empty($this->data)) {
			$conditions = array();
			$conditions['Item.h-006'] = 'a'; // Tipo libro.
			$conditions['Item.h-007'] = 'm'; // Tipo libro.
			$conditions['Item.published'] = '1'; // Publicado.
			
			if (!empty($this->data['books']['Titulo'])) {
				$conditions['Item.245 LIKE'] = '%^a' . $this->data['books']['Titulo'] . '%';
			}
				
			if (!empty($this->data['books']['Autor'])) {
				$conditions['Item.100 LIKE'] = '%^a' . $this->data['books']['Autor'] . '%';
			}
				
			if (!empty($this->data['books']['Materia'])) {
				$conditions['Item.653 LIKE'] = '%^a' . $this->data['books']['Materia'] . '%';
			}
				
			if (!empty($this->data['books']['Siglo'])) {
				$conditions['Item.690 LIKE'] = '%^a' . $this->data['books']['Siglo'];
			}
			
			/*$conditions = array('Item.h-006' => 'a', 'Item.h-007' => 'm', 'Item.published' => '1',
								'Item.245 LIKE' => $this->data['books']['Titulo'] . '%',
								'Item.100 LIKE' => $this->data['books']['Autor'] . '%',
								//'Item.245 LIKE' => '%' . $this->data['books']['Titulo'] . '%',
								'Item.653 LIKE' => '%' . $this->data['books']['Materia'] . '%'
								);*/
		} else {
			$conditions = array('Item.h-006' => 'a', 'Item.h-007' => 'm', 'Item.published' => '1');
		}

		//debug($this->data);
		//debug($conditions); die;
		
		/*
			if (!empty($this->data)) { // Si llegan datos de una busqueda.
		$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
		$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
		$conditions = $this->buildConditions($this->data);
		//debug($conditions); die;
			
		} else { // Si se viene del home o del paginador ...
			
		//$this->Session->delete('Search');
		//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
		if ($this->Session->check('Search')) {
		$conditions = $this->buildConditions($this->Session->read('Search'));
		}
		//}
		}*/
	
		$this->Item->recursive = 1;
	
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'ASC'
		);
		//debug($conditions); die;
		$this->set('items', $this->paginate('Item'));
	}
	
	function century($century = null) {
		$conditions = array('Item.h-006' => 'a', 'Item.h-007' => 'm', 'Item.published' => '1');
		
		if ($century != null){
			$conditions['Item.690'] = '^a' . $century;
		}
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
			
		} else { // Si se viene del home o del paginador ...
			
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'ASC'
		);
		//debug($conditions); die;
		$this->set('items', $this->paginate('Item'));
	}
	
	function year($year = null) {
	$conditions = array('Item.h-006' => 'a', 'Item.h-007' => 'm', 'Item.published' => '1');
		
		if ($year != null){
			$conditions['Item.260 LIKE '] = "%^c" . $year . "%";
		}
		
		/*if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
	
		} else { // Si se viene del home o del paginador ...
	
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
		$this->set('items', $this->paginate('Item'));
		
		$years = $this->Item->find('list', array('fields' => '260', 'conditions' => array('Item.h-006' => 'a', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
		foreach ($years as $i => $v){
			$years[$i] = $this->marc21_decode($v);
			$years[$i] = $years[$i]['c'];
		}
		
		asort($years); // Ordena de menor a mayor.
		$years = array_unique($years); // Elimina duplicados.
		
		$this->set('years', $years);
	}
	
	function matter($matter = null) {
	$conditions = array('Item.h-006' => 'a', 'Item.h-007' => 'm', 'Item.published' => '1');
		
		if ($matter != null){
			$conditions['Item.653 LIKE '] = "%^a" . $matter . "%";
			//debug($conditions); die;
		}
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
	
		} else { // Si se viene del home o del paginador ...
	
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
		
		$this->set('items', $this->paginate('Item'));
		
		$matters = $this->Item->find('list', array('fields' => array('Item.653'), 'conditions' => array('Item.h-006' => 'a', 'Item.h-007' => 'm', 'Item.published' => '1')));
		$this->set('matters', $matters);
		//debug($matters); die;
	}
	
	function author($letter = null) {
	$conditions = array('Item.h-006' => 'a', 'Item.h-007' => 'm', 'Item.published' => '1');
		
		if ($letter != null){
			$conditions['Item.100 LIKE '] = "%^a" . $letter . "%";
			//debug($conditions); die;
		}
	
		/*if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
	
		} else { // Si se viene del home o del paginador ...
	
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '4',
				'conditions' => $conditions,
				//'order' => 'Author.lastname ASC'
		);
	
		$this->set('items', $this->paginate('Item'));
	}
	
	function title($letter = null) {
	$conditions = array('Item.h-006' => 'a', 'Item.h-007' => 'm', 'Item.published' => '1');
		
		if ($letter != null){
			$conditions['Item.245 LIKE '] = "%^a" . $letter . "%";
			//debug($conditions); die;
		}
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
	
		} else { // Si se viene del home o del paginador ...
	
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
	
		/*if ($letter != null) {
			if ($letter != '0-9') {
				$conditions = array('Item.title LIKE' => $letter.'%', 'Item.type_id' => '2');
			} else {
				$conditions = array("
						Item.title LIKE '0%' OR Item.title LIKE '1%' OR Item.title LIKE '2%' OR Item.title LIKE '3%' OR
						Item.title LIKE '4%' OR Item.title LIKE '5%' OR Item.title LIKE '6%' OR Item.title LIKE '7%' OR
						Item.title LIKE '8%' OR Item.title LIKE '9%'
						", 'Item.type_id' => '2');
			}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));
	}

	function advanced_search() {
		
		if (!empty($this->data)) {
			$this->layout = 'default';
			$this->Item->recursive = -1;
			$conditions = array('Item.h-006' => 'a', 'Item.h-007' => 'm', 'Item.published' => '1');	
			
			if (!empty($this->data['Book']['017'])) { // Número de copyright o de depósito legal.
				$conditions['Item.017 LIKE'] = '%' . $this->data['Book']['017'] . '%'; 
			}
			
			if (!empty($this->data['Book']['020'])) { // Número Internacional Normalizado para Libros (ISBN).
				$conditions['Item.020 LIKE'] = '%' . $this->data['Book']['020'] . '%';
			}

			if (!empty($this->data['Book']['022'])) { // Número Internacional Normalizado para Publicaciones Seriadas (ISSN).
				$conditions['Item.022 LIKE'] = '%' . $this->data['Book']['022'] . '%';
			}

			if (!empty($this->data['Book']['028'])) { // Número de plancha.
				$conditions['Item.028 LIKE'] = '%' . $this->data['Book']['028'] . '%';
			}
			
			if (!empty($this->data['Book']['040'])) { // Fuente de la catalogación.
				$conditions['Item.040 LIKE'] = '%' . $this->data['Book']['040'] . '%';
			}
			
			if (!empty($this->data['Book']['041'])) { // Código de lengua.
				$conditions['Item.041 LIKE'] = '%' . $this->data['Book']['041'] . '%';
			}
			
			if (!empty($this->data['Book']['044'])) { // Código del país de la entidad editora/productora.
				$conditions['Item.044 LIKE'] = '%' . $this->data['Book']['044'] . '%';
			}
			
			if (!empty($this->data['Book']['082'])) { // Número de la Clasificación Decimal Dewey.
				$conditions['Item.082 LIKE'] = '%' . $this->data['Book']['082'] . '%';
			}
				
			if (!empty($this->data['Book']['092'])) { // Clasificación local (COTA).
				$conditions['Item.092 LIKE'] = '%' . $this->data['Book']['092'] . '%';
			}
			
			if (!empty($this->data['Book']['100'])) { // Punto de acceso principal - Nombre de persona.
				$conditions['Item.100 LIKE'] = '%' . $this->data['Book']['100'] . '%';
			}
				
			if (!empty($this->data['Book']['110'])) { // Autor corporativo.
				$conditions['Item.110 LIKE'] = '%' . $this->data['Book']['110'] . '%';
			}
			
			if (!empty($this->data['Book']['130'])) { // Título uniforme (Punto de acceso).
				$conditions['Item.130 LIKE'] = '%' . $this->data['Book']['130'] . '%';
			}
			
			if (!empty($this->data['Book']['222'])) { // Título clave.
				$conditions['Item.222 LIKE'] = '%' . $this->data['Book']['222'] . '%';
			}
			
			if (!empty($this->data['Book']['240'])) { // Título uniforme.
				$conditions['Item.240 LIKE'] = '%' . $this->data['Book']['240'] . '%';
			}
			
			if (!empty($this->data['Book']['245'])) { // Mención de título.
				$conditions['Item.245 LIKE'] = '%' . $this->data['Book']['245'] . '%';
			}
			
			if (!empty($this->data['Book']['246'])) { // Variante de título.
				$conditions['Item.246 LIKE'] = '%' . $this->data['Book']['246'] . '%';
			}
			
			if (!empty($this->data['Book']['247'])) { // Título anterior.
				$conditions['Item.247 LIKE'] = '%' . $this->data['Book']['247'] . '%';
			}
			
			if (!empty($this->data['Book']['250'])) { // Mención de edición.
				$conditions['Item.250 LIKE'] = '%' . $this->data['Book']['250'] . '%';
			}
			
			if (!empty($this->data['Book']['260'])) { // Publicación, distribución, etc. (pie de imprenta).
				$conditions['Item.260 LIKE'] = '%' . $this->data['Book']['260'] . '%';
			}
			
			if (!empty($this->data['Book']['300'])) { // Descripción física.
				$conditions['Item.300 LIKE'] = '%' . $this->data['Book']['300'] . '%';
			}
			
			if (!empty($this->data['Book']['310'])) { // Periodicidad actual.
				$conditions['Item.310 LIKE'] = '%' . $this->data['Book']['310'] . '%';
			}
			
			if (!empty($this->data['Book']['321'])) { // Periodicidad anterior.
				$conditions['Item.321 LIKE'] = '%' . $this->data['Book']['321'] . '%';
			}
			
			if (!empty($this->data['Book']['362'])) { // Fechas de publicación y/o designación secuencial.
				$conditions['Item.362 LIKE'] = '%' . $this->data['Book']['362'] . '%';
			}
			
			if (!empty($this->data['Book']['380'])) { // Forma de la obra.
				$conditions['Item.380 LIKE'] = '%' . $this->data['Book']['380'] . '%';
			}
			
			if (!empty($this->data['Book']['500'])) { // Nota general.
				$conditions['Item.500 LIKE'] = '%' . $this->data['Book']['500'] . '%';
			}
			
			if (!empty($this->data['Book']['501'])) { // Nota de “Con”.
				$conditions['Item.501 LIKE'] = '%' . $this->data['Book']['501'] . '%';
			}
			
			if (!empty($this->data['Book']['505'])) { // Nota de contenido con formato.
				$conditions['Item.505 LIKE'] = '%' . $this->data['Book']['505'] . '%';
			}
			
			if (!empty($this->data['Book']['510'])) { // Nota de citas o referencias bibliográficas.
				$conditions['Item.510 LIKE'] = '%' . $this->data['Book']['510'] . '%';
			}
			
			if (!empty($this->data['Book']['515'])) { // Nota de peculiaridades de la numeración.
				$conditions['Item.515 LIKE'] = '%' . $this->data['Book']['515'] . '%';
			}
			
			if (!empty($this->data['Book']['520'])) { // Nota de sumario, etc.
				$conditions['Item.520 LIKE'] = '%' . $this->data['Book']['520'] . '%';
			}
			
			if (!empty($this->data['Book']['530'])) { // Nota de formato físico adicional disponible.
				$conditions['Item.530 LIKE'] = '%' . $this->data['Book']['530'] . '%';
			}
			
			if (!empty($this->data['Book']['534'])) { // Nota sobre la versión original.
				$conditions['Item.534 LIKE'] = '%' . $this->data['Book']['534'] . '%';
			}
			
			if (!empty($this->data['Book']['546'])) { // Nota de lengua.
				$conditions['Item.546 LIKE'] = '%' . $this->data['Book']['546'] . '%';
			}
			
			if (!empty($this->data['Book']['555'])) { // Nota de índice acumulativo u otros instrumentos bibliográficos.
				$conditions['Item.555 LIKE'] = '%' . $this->data['Book']['555'] . '%';
			}
			
			if (!empty($this->data['Book']['588'])) { // Nota de fuente de la descripción.
				$conditions['Item.588 LIKE'] = '%' . $this->data['Book']['588'] . '%';
			}
			
			if (!empty($this->data['Book']['600'])) { // Punto de acceso adicional de materia - Nombre de persona.
				$conditions['Item.600 LIKE'] = '%' . $this->data['Book']['600'] . '%';
			}
			
			if (!empty($this->data['Book']['610'])) { // Punto de acceso adicional de materia - Nombre de entidad corporativa.
				$conditions['Item.610 LIKE'] = '%' . $this->data['Book']['610'] . '%';
			}
			
			if (!empty($this->data['Book']['650'])) { // Punto de acceso adicional de materia – Término de materia.
				$conditions['Item.650 LIKE'] = '%' . $this->data['Book']['650'] . '%';
			}
			
			if (!empty($this->data['Book']['651'])) { // Punto de acceso adicional de materia - Nombre geográfico.
				$conditions['Item.651 LIKE'] = '%' . $this->data['Book']['651'] . '%';
			}
			
			if (!empty($this->data['Book']['653'])) { // Término de indización – No controlado.
				$conditions['Item.653 LIKE'] = '%' . $this->data['Book']['653'] . '%';
			}
			
			if (!empty($this->data['Book']['690'])) { // Siglo.
				$conditions['Item.690 LIKE'] = '%' . $this->data['Book']['690'] . '%';
			}
			
			if (!empty($this->data['Book']['700'])) { // Punto de acceso adicional - Nombre personal.
				$conditions['Item.700 LIKE'] = '%' . $this->data['Book']['700'] . '%';
			}
			
			if (!empty($this->data['Book']['710'])) { // Punto de acceso adicional - Nombre corporativo.
				$conditions['Item.710 LIKE'] = '%' . $this->data['Book']['710'] . '%';
			}
			
			if (!empty($this->data['Book']['740'])) { // Punto de acceso adicional - Título relacionado o analítico no controlado.
				$conditions['Item.740 LIKE'] = '%' . $this->data['Book']['740'] . '%';
			}
			
			if (!empty($this->data['Book']['773'])) { // Enlace al documento fuente.
				$conditions['Item.773 LIKE'] = '%' . $this->data['Book']['773'] . '%';
			}
			
			if (!empty($this->data['Book']['850'])) { // Institución que posee los fondos.
				$conditions['Item.850 LIKE'] = '%' . $this->data['Book']['850'] . '%';
			}
			
			if (!empty($this->data['Book']['852'])) { // Localización.
				$conditions['Item.852 LIKE'] = '%' . $this->data['Book']['852'] . '%';
			}
			
			if (!empty($this->data['Book']['856'])) { // Localización y acceso electrónicos.
				$conditions['Item.856 LIKE'] = '%' . $this->data['Book']['856'] . '%';
			}
			
			//debug($conditions); die;
			
			//$items = $this->Item->find('all', array('conditions' => $conditions));
			//debug($items); die;
			
			$this->paginate = array(
				//'limit' => '20',
				'conditions' => $conditions
			);
			
			$this->set('items', $this->paginate('Item'));
			
			// Searches.
			/*if ($this->Session->check('Auth.User')) {
				$s = array('user_id' => $this->Session->read('Auth.User.id'), 'ip' => $_SERVER['REMOTE_ADDR'], 'search' => $conditions);
			} else {
				$s = array('user_id' => '0', 'ip' => $_SERVER['REMOTE_ADDR'], 'search' => $conditions);
			}
			$this->Search->save($s);*/
		}
	}
	
	function view($id = null) {
		//App::import('Vendor', 'pdf2text');
		
		//$a = new PDF2Text();
		//$a->setFilename('C:\xampp\htdocs\tesis\webroot\files\books\prueba.pdf');
		//$a->decodePDF();
		//echo utf8_encode($a->output());
		//die;
		
		$this->Item->recursive = 1;
		if (!$id) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('item', $this->Item->read(null, $id));
	}

	function add() {
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}

		if (!empty($this->data)) {

			$data = $this->data;
			$time = time();

			if ($_FILES['data']['error']['Book']['cover'] == 0){
				$uploaddir = "..".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Book']['cover']['name']);
				copy($_FILES['data']['tmp_name']['Book']['cover'], $uploadfile);
			}

			if ($_FILES['data']['error']['Book']['item'] == 0){
				$uploaddir = "..".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Book']['item']['name']);
				copy($_FILES['data']['tmp_name']['Book']['item'], $uploadfile);
			}
			
			if ($_FILES['data']['error']['Book']['item'] == 0){
				$data['Book']['item_file_path'] = $time.'_'.$data['Book']['item']['name'];
				$data['Book']['item_content_type'] = $data['Book']['item']['type'];
				$data['Book']['item_file_size'] = $data['Book']['item']['size'];
				$data['Book']['item_file_name'] = $data['Book']['item']['name'];
				
				$data['Book']['cover_path'] = $time.'_'.$data['Book']['cover']['name'];
				$data['Book']['cover_type'] = $this->data['Book']['cover']['type'];
				$data['Book']['cover_size'] = $this->data['Book']['cover']['size'];
				$data['Book']['cover_name'] = $this->data['Book']['cover']['name'];
				
				unset($data['Book']['cover']);
				unset($data['Book']['item']);
				$data['Item'] = $data['Book'];
				unset($data['Book']);
				
				$this->Item->create();
				if ($this->Item->save($data)) {
					$item = $this->Item->getLastInsertID();
					$this->Session->setFlash(__('El archivo ha sido guardado.', true));
					$this->redirect(array('action' => 'view/' . $item));
				} else {
					$this->Session->setFlash(__('El archivo no pudo ser guardado. Por favor, intentélo nuevamente.', true));
				}
				
			} else {
				$this->Session->setFlash('No se subió ningun archivo de la obra. Debe cargar alguno.');
				$this->redirect(array('action' => 'add'));
			}
			
			$this->redirect(array('action' => 'add'));
		}
		
		// ------------------------- Sub-Campo 100a ------------------------- //
		
		$authors = $this->Item->find('list', array('fields' => array('100')));
		
		if ($authors) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($authors as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$authors = "[" . $l . "]";
			$this->set(compact('authors', $authors));
		} else {
			$this->set(compact('authors', false));
		}
		
		// ------------------------- Sub-Campo 245a ------------------------- //
		
		$titles = $this->Item->find('list', array('fields' => array('245')));
		
		if ($titles) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($titles as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$titles = "[" . $l . "]";
			$this->set(compact('titles', $titles));
		} else {
			$this->set(compact('titles', false));
		}
		
		// ------------------------- Sub-Campo 260a ------------------------- //
		
		$places = $this->Item->find('list', array('fields' => array('260')));
		
		if ($places) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($places as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
	
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$places = "[" . $l . "]";
			$this->set(compact('places', $places));
		} else {
			$this->set(compact('places', false));
		}
		
		// ------------------------- Sub-Campo 260b ------------------------- //
		
		$editors = $this->Item->find('list', array('fields' => array('260')));
		
		if ($editors) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($editors as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['b'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$editors = "[" . $l . "]";
			$this->set(compact('editors', $editors));
		} else {
			$this->set(compact('editors', false));
		}
		
		// ------------------------- Sub-Campo 260c ------------------------- //
		
		$years = $this->Item->find('list', array('fields' => array('260')));
		
		if ($years) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($years as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['c'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$years = "[" . $l . "]";
			$this->set(compact('years', $years));
		} else {
			$this->set(compact('years', false));
		}
		
		// ------------------------- Sub-Campo 362a ------------------------- //
		
		$publications = $this->Item->find('list', array('fields' => array('362')));
		
		if ($publications) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($publications as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$publications = "[" . $l . "]";
			$this->set(compact('publications', $publications));
		} else {
			$this->set(compact('publications', false));
		}
		
		// ------------------------- Sub-Campo 653a ------------------------- //
		
		$matters = $this->Item->find('list', array('fields' => array('653')));
		
		if ($matters) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($matters as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$matters = "[" . $l . "]";
			$this->set(compact('matters', $matters));
		} else {
			$this->set(compact('matters', false));
		}
	}
	
	function edit($id = null) {
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}

		$item = $this->Item->read(null, $id);
		$this->set('item', $item);

		if (!empty($this->data)) {
			$data = $this->data;
			$time = time();
			
			if ($_FILES['data']['error']['Book']['cover'] == 0){
				$uploaddir = "..".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Book']['cover']['name']);
				copy($_FILES['data']['tmp_name']['Book']['cover'], $uploadfile);
				unlink($uploaddir.$item['Item']['cover_path']);
			}
			
			if ($_FILES['data']['error']['Book']['item'] == 0){
				$uploaddir = "..".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Book']['item']['name']);
				copy($_FILES['data']['tmp_name']['Book']['item'], $uploadfile);
				unlink($uploaddir.$item['Item']['item_file_path']);
			}
			
			//if ($_FILES['data']['error']['Book']['item'] == 0){
			
			if ($_FILES['data']['error']['Book']['item'] == 0){
				$data['Book']['item_file_path'] = $time.'_'.$data['Book']['item']['name'];
				$data['Book']['item_content_type'] = $data['Book']['item']['type'];
				$data['Book']['item_file_size'] = $data['Book']['item']['size'];
				$data['Book']['item_file_name'] = $data['Book']['item']['name'];
			}
			unset($data['Book']['item']);
			
			if ($_FILES['data']['error']['Book']['cover'] == 0){
				$data['Book']['cover_path'] = $time.'_'.$data['Book']['cover']['name'];
				$data['Book']['cover_type'] = $this->data['Book']['cover']['type'];
				$data['Book']['cover_size'] = $this->data['Book']['cover']['size'];
				$data['Book']['cover_name'] = $this->data['Book']['cover']['name'];
			}
			unset($data['Book']['cover']);
			
			$data['Item'] = $data['Book'];
			unset($data['Book']);
			
			if ($this->Item->save($data)) {
				$this->Session->setFlash(__('El archivo ha sido guardado.', true));
				$this->redirect(array('action' => 'view', $data['Item']['id']));
			} else {
				$this->Session->setFlash(__('El archivo no pudo ser guardado. Por favor, intentélo nuevamente.', true));
			}
			
			//} else {
			//	$this->Session->setFlash('No se subió ningun archivo de la obra. Debe cargar alguno.');
			//	$this->redirect(array('action' => 'add'));
			//}
			
			$this->redirect(array('action' => 'index'));
		}
		
		// ------------------------- Sub-Campo 100a ------------------------- //
		
		$authors = $this->Item->find('list', array('fields' => array('100')));
		
		if ($authors) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($authors as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$authors = "[" . $l . "]";
			$this->set(compact('authors', $authors));
		} else {
			$this->set(compact('authors', false));
		}
		
		// ------------------------- Sub-Campo 245a ------------------------- //
		
		$titles = $this->Item->find('list', array('fields' => array('245')));
		
		if ($titles) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($titles as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$titles = "[" . $l . "]";
			$this->set(compact('titles', $titles));
		} else {
			$this->set(compact('titles', false));
		}
		
		// ------------------------- Sub-Campo 260a ------------------------- //
		
		$places = $this->Item->find('list', array('fields' => array('260')));
		
		if ($places) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($places as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
	
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$places = "[" . $l . "]";
			$this->set(compact('places', $places));
		} else {
			$this->set(compact('places', false));
		}
		
		// ------------------------- Sub-Campo 260b ------------------------- //
		
		$editors = $this->Item->find('list', array('fields' => array('260')));
		
		if ($editors) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($editors as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['b'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$editors = "[" . $l . "]";
			$this->set(compact('editors', $editors));
		} else {
			$this->set(compact('editors', false));
		}
		
		// ------------------------- Sub-Campo 260c ------------------------- //
		
		$years = $this->Item->find('list', array('fields' => array('260')));
		
		if ($years) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($years as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['c'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$years = "[" . $l . "]";
			$this->set(compact('years', $years));
		} else {
			$this->set(compact('years', false));
		}
		
		// ------------------------- Sub-Campo 362a ------------------------- //
		
		$publications = $this->Item->find('list', array('fields' => array('362')));
		
		if ($publications) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($publications as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$publications = "[" . $l . "]";
			$this->set(compact('publications', $publications));
		} else {
			$this->set(compact('publications', false));
		}
		
		// ------------------------- Sub-Campo 653a ------------------------- //
		
		$matters = $this->Item->find('list', array('fields' => array('653')));
		
		if ($matters) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($matters as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$matters = "[" . $l . "]";
			$this->set(compact('matters', $matters));
		} else {
			$this->set(compact('matters', false));
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id invalido para el item.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$item = $this->Item->find('first', array('conditions' => array('Item.id' => $id)));
		if ($this->Item->delete($id)) {
			$this->Session->setFlash(__('Item eliminado', true));
			$this->Attachment->delete_files($item['Item']['item_file_path']);
			if (!isset($this->passedArgs[1])) {
				$this->redirect(array('action'=>'index'));
			} else {
				$this->redirect(array('action' => 'view', $this->passedArgs[1]));
			}
		}
		$this->Session->setFlash(__('El item no fue eliminado.', true));
		if (!isset($this->passedArgs[1])) {
			$this->redirect(array('action'=>'index'));
		} else {
			$this->redirect(array('action' => 'view', $this->passedArgs[1]));
		}
	}
	
	function marc21($id = null) {
		//$this->layout = null;
		$this->Item->recursive = 1;
		if (!$id) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('item', $this->Item->read(null, $id));
	}

/*
	function libros() {
		$this->Session->write('Search.Item.type_id', 1);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}
	
	function revistas() {
		$this->Session->write('Search.Item.type_id', 2);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
		
	}
	
	function manuscritos() {
		$this->Session->write('Search.Item.type_id', 3);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}
	
	function impresos() {
		$this->Session->write('Search.Item.type_id', 4);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}
	
	function iconografias() {
		$this->Session->write('Search.Item.type_id', 5);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}
	
	function trabajos() {
		$this->Session->write('Search.Item.type_id', 6);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}
*/
}
