<?php

class SamplesController extends AppController{


	public function index(){

		$sample = "TEST";
		$this->set('sample',$sample);
	}
}