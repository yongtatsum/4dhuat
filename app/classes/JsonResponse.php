<?php 

class JsonResponse {

    private $code = 200;
    private $response = '';
    private $body = '';
    private $subject = 'OK';

    public function setCode( $code = 200 )
    {
    	$this->code = $code;
    }

    public function setResponse( $response = [] )
    {
    	$this->response = $response;
    }

    public function setBody( $body = '' )
    {
    	$this->body = $body;
    }

    public function setSubject( $subject = '' )
    {
    	$this->subject = $subject;
    }

    public function get()
    {
        return Response::json([
            'meta' => [
                'stat' => $this->code,
                'msg' => [
                    'subj' => $this->subject,
                    'body' => $this->body
                ]
            ],
            'result' => is_array($this->response) ? $this->_nullToEmpty($this->response) : ''
        ], $this->code);
    }

    protected function _nullToEmpty($obj) {
        $new_json_array = array();
        foreach ($obj as $k => $v) {
            if (is_array($v)) {
                $new_json_array[$k] = $this->_nullToEmpty($v);
                continue;
            }
            if ($v === null) {
                $new_json_array[$k] = '';
                continue;
            }
            $new_json_array[$k] = $v;
        }
        return $new_json_array;
    }
}
