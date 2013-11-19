<?php
/**
 * ApiController Class
 * @author Marco
 */
class ApiController extends Controller
{
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers 
     */
    Const APPLICATION_ID = 'ASCCPE';
 
    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';
    /**
     * @return array action filters
     */
    public function filters()
    {
            return array();
    }

    
    
    public function actionPing() {    
		$appName = Yii::app()->name;
		$this->_sendResponse(200, CJSON::encode($appName), 'application/json');
		
    }

    
    
    
    public function actionLogin() {
	    // Check if username was submitted via GET
	    if(!isset($_GET['username']))
	        $this->_sendResponse(500, 'Error: Parameter <b>username</b> is missing' );

	    // Check if password was submitted via GET
	    if(!isset($_GET['password']))
	        $this->_sendResponse(500, 'Error: Parameter <b>password</b> is missing' );
	        
	        
        // Get the respective model instance
	    switch($_GET['model'])
	    {
	        case 'user':
	            $models = User::model()->find('username = ?', array($_GET['username']));
	            break;
	        default:
	            // Model not implemented error
	            $this->_sendResponse(501, sprintf('Error: Mode <b>login</b> is not implemented for model <b>%s</b>', $_GET['model']));
	            Yii::app()->end();
	    }

	    if($models===null) {
	        // Error: Unauthorized
//	        $this->_sendResponse(401, 'Username not found');
			$this->_sendResponse(401, CJSON::encode('Username not found'), 'application/json');
	    } elseif(md5($_GET['password']) != $models->password) {
	    	// Error: Unauthorized
//        	$this->_sendResponse(401, 'User Password is invalid');
			$this->_sendResponse(401, CJSON::encode('Password is invalid'), 'application/json');
	    } else{
	    	$response = array(
	    		'authenticated'=>true,
	    		'attributes'=>$models->attributes,
	    	);
	    	$this->_sendResponse(200, CJSON::encode($response), 'application/json');
	    }

    }
    
    
    
    public function actionList()
    {
    }
    public function actionView()
    {
    }
    public function actionCreate()
    {
    }
    public function actionUpdate()
    {
    }
    public function actionDelete()
    {
    }
    
    
	private function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
	{
	    // set the status
	    $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
	    header($status_header);
	    // and the content type
	    header('Content-type: ' . $content_type);
	 
	    // pages with body are easy
	    if($body != '')
	    {
	        // send the body
	        echo $body;
	    }
	    // we need to create the body if none is passed
	    else
	    {
	        // create some body messages
	        $message = '';
	 
	        // this is purely optional, but makes the pages a little nicer to read
	        // for your users.  Since you won't likely send a lot of different status codes,
	        // this also shouldn't be too ponderous to maintain
	        switch($status)
	        {
	            case 401:
	                $message = 'You must be authorized to view this page.';
	                break;
	            case 404:
	                $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
	                break;
	            case 500:
	                $message = 'The server encountered an error processing your request.';
	                break;
	            case 501:
	                $message = 'The requested method is not implemented.';
	                break;
	        }
	 
	        // servers don't always have a signature turned on 
	        // (this is an apache directive "ServerSignature On")
	        $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];
	 
	        // this should be templated in a real-world solution
	        $body = '
					<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
					<html>
					<head>
					    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
					    <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
					</head>
					<body>
					    <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
					    <p>' . $message . '</p>
					    <hr />
					    <address>' . $signature . '</address>
					</body>
					</html>';
	 
	        echo $body;
	    }
	    Yii::app()->end();
	}   

	
	
	private function _getStatusCodeMessage($status)
	{
	    // these could be stored in a .ini file and loaded
	    // via parse_ini_file()... however, this will suffice
	    // for an example
	    $codes = Array(
	        200 => 'OK',
	        400 => 'Bad Request',
	        401 => 'Unauthorized',
	        402 => 'Payment Required',
	        403 => 'Forbidden',
	        404 => 'Not Found',
	        500 => 'Internal Server Error',
	        501 => 'Not Implemented',
	    );
	    return (isset($codes[$status])) ? $codes[$status] : '';
	}
}

?>