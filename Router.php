<?php


class Router
{
    /**
     * @var IRequest
     */
    public $request=null;
    public $routes=[];
    public $postRoutes=[];

    public function __construct(IRequest $request)
    {
         $this->request=$request;
    }

    public function get($path,$callback)
   {
       $this->routes[$path]=$callback;
   }
    public function post(/*string*/ $path, /*Closure*/ $callback)
    {
        $this->postRoutes[$path]=$callback;
    }

   public function __destruct()
   {
       //$pathInfo= $_SERVER['PATH_INFO'] ?? '/';
       $pathInfo=$this->request->getPath();
       //$method=strtolower($_SERVER['REQUEST_METHOD']);
       if($this->request->getMethod()==='get') {
           $callback = $this->routes[$pathInfo] ?? false;
       }else {
           $callback=$this->postRoutes[$pathInfo] ?? false;
       }

       if(!$callback)
       {
           $content = "404 - Page not found";
       }
       else{
           if(is_string($callback))
           {
               //Render View file
               $content= $this->getViewContent($callback);
               //
           }
           else
           {
               $content = call_user_func($callback,$this->request,$this);
           }
       }

       include_once __DIR__."/Views/layout.php";
   }

    public function getViewContent(string $view,$params=[])
    {
        foreach ($params as $key=>$value)
        {
            $$key=$value;
        }
        ob_start();
        include_once __DIR__."/Views/{$view}.php";
        return ob_get_clean();
    }

}