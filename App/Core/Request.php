<?php
namespace App\core;

class Request
{
  //  public  $REDIRECT_STATUS;
    public  $HTTP_HOST;
    public  $HTTP_CONNECTION;
    //public  $HTTP_CACHE_CONTROL;
   // public  $HTTP_UPGRADE_INSECURE_REQUESTS;
    public  $HTTP_USER_AGENT;
    public  $HTTP_ACCEPT;
    public  $HTTP_ACCEPT_ENCODING;
    public  $HTTP_ACCEPT_LANGUAGE;
    public  $PATH;
    public  $SystemRoot;
 //   public  $COMSPEC;
    public  $PATHEXT;
    public  $WINDIR;
    public  $SERVER_SIGNATURE;
    public  $SERVER_SOFTWARE;
    public  $SERVER_NAME;
    public  $SERVER_ADDR;
    public  $SERVER_PORT;
    public  $REMOTE_ADDR;
    public  $DOCUMENT_ROOT;
    public  $REQUEST_SCHEME;
    public  $CONTEXT_PREFIX;
    public  $CONTEXT_DOCUMENT_ROOT;
    public  $SERVER_ADMIN;
    public  $SCRIPT_FILENAME;
    public  $REMOTE_PORT;
    public  $REDIRECT_URL;
    public  $REDIRECT_QUERY_STRING;
    public  $GATEWAY_INTERFACE;
    public  $SERVER_PROTOCOL;
    public  $REQUEST_METHOD;
    public  $QUERY_STRING;
    public  $REQUEST_URI;
    public  $SCRIPT_NAME;
    public  $PHP_SELF;
    public  $REQUEST_TIME_FLOAT;
    public  $REQUEST_TIME;
    public  $REQUEST;
    public function __construct()
    {
        // $this->REDIRECT_STATUS = $_SERVER['REDIRECT_STATUS'];
         $this->HTTP_HOST = $_SERVER['HTTP_HOST'];
         $this->HTTP_CONNECTION = $_SERVER['HTTP_CONNECTION'];
        // $this->HTTP_CACHE_CONTROL = $_SERVER['HTTP_CACHE_CONTROL'];
       //  $this->HTTP_UPGRADE_INSECURE_REQUESTS = $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'];
       // $this->HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
         $this->HTTP_ACCEPT = $_SERVER['HTTP_ACCEPT'];
         $this->HTTP_ACCEPT_ENCODING = $_SERVER['HTTP_ACCEPT_ENCODING'];
        // $this->HTTP_ACCEPT_LANGUAGE = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
         $this->PATH = $_SERVER['PATH'];
         $this->SystemRoot = $_SERVER['SystemRoot'];
        // $this->COMSPEC = $_SERVER['COMSPEC'];
         $this->PATHEXT = $_SERVER['PATHEXT'];
         $this->WINDIR = $_SERVER['WINDIR'];
         $this->SERVER_SIGNATURE = $_SERVER['SERVER_SIGNATURE'];
         $this->SERVER_SOFTWARE = $_SERVER['SERVER_SOFTWARE'];
         $this->SERVER_NAME = $_SERVER['SERVER_NAME'];
         $this->SERVER_ADDR = $_SERVER['SERVER_ADDR'];
         $this->SERVER_PORT = $_SERVER['SERVER_PORT'];
         $this->REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
         $this->DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
         $this->REQUEST_SCHEME = $_SERVER['REQUEST_SCHEME'];
         $this->CONTEXT_PREFIX = $_SERVER['CONTEXT_PREFIX'];
         $this->CONTEXT_DOCUMENT_ROOT = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
         $this->SERVER_ADMIN = $_SERVER['SERVER_ADMIN'];
         $this->SCRIPT_FILENAME = $_SERVER['SCRIPT_FILENAME'];
         $this->REMOTE_PORT = $_SERVER['REMOTE_PORT'];
       //  $this->REDIRECT_URL = $_SERVER['REDIRECT_URL'];
       //  $this->REDIRECT_QUERY_STRING = $_SERVER['REDIRECT_QUERY_STRING'];
         $this->GATEWAY_INTERFACE = $_SERVER['GATEWAY_INTERFACE'];
         $this->SERVER_PROTOCOL = $_SERVER['SERVER_PROTOCOL'];
         $this->REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
         $this->QUERY_STRING = $_SERVER['QUERY_STRING'];
         $this->REQUEST_URI = $_SERVER['REQUEST_URI'];
         $this->SCRIPT_NAME = $_SERVER['SCRIPT_NAME'];
         $this->PHP_SELF = $_SERVER['PHP_SELF'];
         $this->REQUEST_TIME_FLOAT = $_SERVER['REQUEST_TIME_FLOAT'];
         $this->REQUEST_TIME = $_SERVER['REQUEST_TIME'];
         $this->REQUEST = $_REQUEST;
    }
}