<?php
class SubmissionsController extends CformsAppController {

	var $name = 'Submissions';
	var $helpers = array('Html', 'Form', 'Cforms.Csv');
	var $components = array('Cforms.Cforms');

	function admin_export($formId = null){
		if (!$formId) {
			$this->Session->setFlash(__('Invalid Submission', true));
			$this->redirect(array('action' => 'index'));
		}

		Configure::write('debug', 0);

		$submissions = $this->Submission->getSubmissions($formId);
		$fields = array_keys($submissions[0]);

		$this->set(compact('submissions', 'fields'));
		$this->layout = 'csv/default';
		$this->render('csv/admin_export');

	}

	function admin_index() {
		$this->Submission->recursive = 0;
		$this->set('submissions', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Submission', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('submission', $this->Submission->read(null, $id));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Submission', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Submission->del($id)) {
			$this->Session->setFlash(__('Submission deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Submission could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

	function view_upload($encodedPath = false){
		$file = base64_decode($encodedPath);
		//First, see if the file exists
		  if (!is_file($file)) { die("<b>404 File not found!</b>"); }

		  //Gather relevent info about file
		  $len = filesize($file);
		  $filename = basename($file);
		  $file_extension = strtolower(substr(strrchr($filename,"."),1));

		  //This will set the Content-Type to the appropriate setting for the file
		  switch( $file_extension ) {
			case "pdf": $ctype="application/pdf"; break;
		    case "exe": $ctype="application/octet-stream"; break;
		    case "zip": $ctype="application/zip"; break;
		    case "doc": $ctype="application/msword"; break;
		    case "xls": $ctype="application/vnd.ms-excel"; break;
		    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		    case "gif": $ctype="image/gif"; break;
		    case "png": $ctype="image/png"; break;
		    case "jpeg":
		    case "jpg": $ctype="image/jpg"; break;
		    case "mp3": $ctype="audio/mpeg"; break;
		    case "wav": $ctype="audio/x-wav"; break;
		    case "mpeg":
		    case "mpg":
		    case "mpe": $ctype="video/mpeg"; break;
		    case "mov": $ctype="video/quicktime"; break;
		    case "avi": $ctype="video/x-msvideo"; break;

		    //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
		    case "php":
		    case "htm":
		    case "html":
		    case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;

		    default: $ctype="application/force-download";
		  }

		  //Begin writing headers
		  header("Pragma: public");
		  header("Expires: 0");
		  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		  header("Cache-Control: public");
		  header("Content-Description: File Transfer");

		  //Use the switch-generated Content-Type
		  header("Content-Type: $ctype");

		  //Force the download
		  $header="Content-Disposition: attachment; filename=".$filename.";";
		  header($header );
		  header("Content-Transfer-Encoding: binary");
		  header("Content-Length: ".$len);
		  @readfile($file);
		  exit;
	}

}
?>