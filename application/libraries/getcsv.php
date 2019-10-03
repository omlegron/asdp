<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Getcsv {

	private $file_path = "";
	private $handle = "";

	public function set_file_path($file_path)
	{
		$this->file_path = $file_path;
		return $this;
	}

	private function get_handle()
	{
		$this->handle = fopen($this->file_path, "r");
		return $this;
	}

	private function close_csv()
	{
		fclose($this->handle);
		return $this;
	}

	//this is the most current function to use
	public function get_array()
	{
		$this->get_handle();

		$row = 0;
		while (($data = fgetcsv($this->handle, 0, "\t")) !== FALSE)
		{
			if($row == 0)
			{
				foreach ($data as $key => $value)
				{
					$title[$key] = trim($value); //this extracts the titles from the first row and builds array
				}
			}
			else
			{
				$new_row = $row - 1; //this is needed so that the returned array starts at 0 instead of 1
				foreach($title as $key => $value) //this assumes there are as many columns as their are title columns
				{
					if (trim($data[$key]) != '') {
					$result[$new_row][$value] = trim($data[$key]);
					}
				}
			}
			$row++;
		}
		$this->close_csv();
		return $result;
	}

	// --------------------------------Main Functions Above--------------------------- //

	//This function is being left in incase I ever need it
	function get_csv_array()
	{
		$row = 0;
		if (($handle = fopen($this->file_path, "r")) !== FALSE)
		{
			$delimiter=$this->detectDelimiter($handle);
			$final_array['delimiter'] = $delimiter;
			fseek($handle, 0);
			while (($data = fgetcsv($handle, 5000, ";")) !== FALSE)
			{
				$final_array['data'][$row] = $data;
				$row++;
			}
			fclose($handle);
		}
		return $final_array;
	}

	function detectDelimiter($handle)
	{
	    $delimiters = array(
	        ';' => 0,
	        ',' => 0,
	        "\t" => 0,
	        "|" => 0
	    );

	    $firstLine = fgets($handle);
	    foreach ($delimiters as $delimiter => &$count) {
	        $count = count(str_getcsv($firstLine, $delimiter));
	    }

	    return array_search(max($delimiters), $delimiters);
	}

} //End of class