<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $limit = 100;

	public function readEmployees() {
		$i = $this->input->post('page') != '' ? $this->input->post('page') : 1;
		$this->db->select('emp_no, birth_date, first_name, last_name, gender, hire_date');
		$this->db->from('employees');
		$this->db->order_by('emp_no', 'ASC');
		$this->db->limit($this->limit, $this->limit*($i-1));
		$response = $this->db->get();
		echo json_encode($response->result());
	}

	public function readProductionEmployees() {
		$i = $this->input->post('page') != '' ? $this->input->post('page') : 1;
		$this->db->select('
			e.emp_no, 
			e.first_name, 
			e.last_name,
			MAX(s.salary) AS salary,
			t.title,
			d.dept_name
		');
		$this->db->from('employees AS e');
		$this->db->join('salaries as s', 'e.emp_no = s.emp_no', 'inner');
		$this->db->join('titles as t', 'e.emp_no = t.emp_no', 'inner');
		$this->db->join('dept_emp as de', 'e.emp_no = de.emp_no', 'inner');
		$this->db->join('departments as d', 'de.dept_no = d.dept_no', 'inner');
		$this->db->where('t.title', 'Engineer');
		$this->db->where('d.dept_name', 'Production');
		$this->db->group_by('e.emp_no');
		$this->db->order_by('e.emp_no', 'ASC');
		$this->db->limit($this->limit, $this->limit*($i-1));
		$response = $this->db->get();
		echo json_encode($response->result());
	}

	public function readFullEmployees() {
		$i = $this->input->post('page') != '' ? $this->input->post('page') : 1;
		$this->db->select('
			e.emp_no, 
			e.first_name, 
			e.last_name,
			MAX(s.salary) AS salary,
			t.title,
			d.dept_name
		');
		$this->db->from('employees AS e');
		$this->db->join('salaries as s', 'e.emp_no = s.emp_no', 'inner');
		$this->db->join('titles as t', 'e.emp_no = t.emp_no', 'inner');
		$this->db->join('dept_emp as de', 'e.emp_no = de.emp_no', 'inner');
		$this->db->join('departments as d', 'de.dept_no = d.dept_no', 'inner');
		$this->db->where('s.salary >', 100000);
		$this->db->group_by('e.emp_no');
		$this->db->order_by('e.emp_no', 'ASC');
		$this->db->limit($this->limit, $this->limit*($i-1));
		$response = $this->db->get();
		echo json_encode($response->result());
	}

	public function employees() {
		$contentViewBag = array(
			'type' => 'readEmployees',
			'method' => site_url('welcome/readEmployees'),
			'limit' => $this->limit
		);
		$this->load->view('employees', $contentViewBag);
	}

	public function productionEmployees() {
		$contentViewBag = array(
			'type' => 'readProductionEmployees',
			'method' => site_url('welcome/readProductionEmployees'),
			'limit' => $this->limit
		);
		$this->load->view('fullemployees', $contentViewBag);
	}

	public function fullEmployees() {
		$contentViewBag = array(
			'type' => 'readFullEmployees',
			'method' => site_url('welcome/readFullEmployees'),
			'limit' => $this->limit
		);
		$this->load->view('fullemployees', $contentViewBag);
	}

	public function index() {
		redirect('welcome/employees');
	}

}
