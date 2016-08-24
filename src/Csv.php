<?php

namespace Codeuz\Csv;

class Csv {
	
	/**
     * Headers (columns displayed names)
     *
     * @var array
     */
	protected $headers = array();
	
	/**
     * Data
     *
     * @var array
     */
	protected $data = array();
	
	/**
     * Filename
     *
     * @var sring
     */
	protected $filename = null;
	
	/**
     * Delimiter character
     *
     * @var sring
     */
	protected $delimiter = ";";
	
	/**
     * Set csv filename
     *
	 * @param string $filename
	 * 
     * @return Codeuz\Csv\Csv
     */
	public function setFilename($filename = null)
	{
		$this->filename = $filename;
		return $this;
	}
	
	/**
     * Set headers (columns displayed names)
     *
	 * @param array $headers
	 * 
     * @return Codeuz\Csv\Csv
     */
	public function setHeaders($headers = null) 
	{
		if (is_array($headers)) {
			foreach ($headers as $k => $v) {
				$this->headers[$k] = $v;
			}
		}
		return $this;
	}
	
	/**
     * Set data
     *
	 * @param array $data
	 * 
     * @return Codeuz\Csv\Csv
     */
     public function setData($data = null)
	 {
	 	if (is_array($data)) {
	 		foreach ($data as $d) {
				$this->data[] = $d;
			}
		}
		return $this;
	 }
	 
	/**
     * Export (output only for now)
	 * 
     * @return Codeuz\Csv\Csv
     */
     public function export() 
	 {
	 	// Display html headers
	 	$filename = $this->filename ? $this->filename : 'csv-'.uniqid();
	 	header('Content-Type: text/csv; charset=utf-8');
        header( 'Content-Disposition: attachment;filename='.$filename.'.csv');
        $fp = fopen('php://output', 'w');
		
		// Complete headers keys
		$this->completeHeaders();
		
		// Display headers
		$line = array();
		foreach($this->headers as $k => $v) {
			$line[$k] = $v;
		}
		fputcsv($fp, $line, $this->delimiter);
		
		// Display data
		foreach ($this->data as $d) {
			$line = array();
			foreach($this->headers as $k => $v) {
				$line[$k] = isset($d[$k]) ? $d[$k] : '';
			}
			fputcsv($fp, $line, $this->delimiter);
		}
		
		// Close output
		fclose($fp);
		return $this;
	 }
	 
	 /**
     * Complete headers keys from data
	 * 
     * @return Codeuz\Csv\Csv
     */
	 public function completeHeaders() {
	 	foreach ($this->data as $d) {
			$line = array();
			$copy = $d;
			
			// check saved headers keys
			foreach ($this->headers as $k => $v) {
				if (isset($d[$k])) {
					unset($copy[$k]);
				}
			}
			
			// check for unsaved headers keys
			foreach ($copy as $k => $v) {
				$this->headers[$k] = $k;
			}
		}
		
		return $this;
	 }
}