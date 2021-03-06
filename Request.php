<?php
namespace app;

class Request implements IRequest
{
    public function __construct()
    {
        foreach ($_SERVER as $key => $value) {
            $camelCaseKey = $this->toCamelCase($key);
            $this->{$camelCaseKey} = $value;
        }
    }

    private function toCamelCase($string) // DOCUMENT_ROOT
    {
        $result = strtolower($string); // document_root

        preg_match_all('/_[a-z]/', $result, $matches);
        foreach ($matches[0] as $match) { // _r
            $c = str_replace('_', '', strtoupper($match)); // _R -> R
            $result = str_replace($match, $c, $result);
        }

        return $result;
    }

    public function getBody()
    {
        if($this->getMethod()=='get')
        {
            $body=[];
            foreach ($_GET as $key=>$value)
            {
                $body[$key]=filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            } return $body;
        }
       else if($this->getMethod()=='post')
       {
           $body=[];
           foreach ($_POST as $key=>$value)
           {
               $body[$key]=filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
           } return $body;
       }
        /////////////////////////
        $data = [];
        if ($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        } else if ($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $data;
    }

    public function getMethod()
    {
        return strtolower($this->requestMethod);
    }

    public function getPath()
    {
        return $this->pathInfo ?? '/';
    }
}