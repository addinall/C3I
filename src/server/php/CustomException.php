<?php
// CAPTAIN SLOG
// vim: set expandtab tabstop=4 shiftwidth=4 autoindent smartindent:
// File         : custom_exception.php
// System       : C3I 
// Date         : May 19 2015
// Author       : Mark Addinall
// Synopsis     : Allows the coder to implement custom exceptions in the
//                PHP code not only for error trapping but to enable
//                some pseudo RTOS exception driven scheduling system
//                to be used with incoming AJaX alarms, semaphores
//                and monitors.
//
//------------+-------------------------------+------------
// DATE       |    CHANGE                     |    WHO
//------------+-------------------------------+------------
// 01/01/2002 | Initial port from PHP3.0      |  MA
// 02/10/2005 | Initial creation Toolset V1.0 |  MA
// 29/04/2007 | Adept to Telstra NOC          |  MA
// 12/08/2009 | Complete re-write v2.x own use|  MA
// 18/02/2010 | Re-write CITEC (unfinished)   |  MA
// 12/02/2012 | Re-write v3.x new object model|  MA
// 16/04/2013 | Re-write v4 new object model  |  MA
// 02/05/2013 | Added support for Mongo noSQL |  MA
// 08/05/2013 | Added an SQL Parser for Mongo |  MA
// 11/04/2014 | Back on the job.              |  MA
// 11/06/2014 | Back in. Distracted by work.  |  MA
// 29/07/2014 | Added Redis support, cache    |  MA
// 22/02/2016 | Adapt to new SPA systems      |  MA
// 26/02/2016 | FINALLY implement PDO         |  MA
// 30/08/2016 | This is likely to be the last incarnation
//              of this object.  I am probably going to
//              drop PHP as the backend for my applications
//              after this year and use a full stack solution
//              such as Angular2 or METEOR.
//              The set of PHP objects has served wll for a very long
//              time, which brings me to my last note.
//              Some of you may be wondering WHY I am keeping
//              this level of abstraction wrapped around a 
//              PDO level of abstraction?  Since I am going
//              to phase out PHO shortly, I do not wish to give
//              myself extensive work to do in the rest of the OOP
//              toolset.  If the database abstraction API remains
//              consistant to the outward facing world, the
//              changes are restricted to this object alone.
//              That is the nice thing about OOD and consistant APIs.
//      
//              This last version  of the PHP toolset has NO interaction
//              with the DOM, the browser, HTML code, styles,
//              scripts.  It is a pure RESTFUL API that responds
//              to date requests from a client(s).
//
//              It made sense to retire PHP involvement in the front end.
//              It is a nice little language, but the mish mash it
//              creates these days trying to play in the front end
//              is jst not worth the confusion.  Javascript fameworks do the
//              job better and cleaner than jumping in and out of
//              HTML generation based on spurious SESSION values.
//          
//              Fourteen years is quite a lifespan for a toolset!
//              This is the FINAL version.
//
//------------+-------------------------------+------------



// -------------------------------
interface IException {
    // Protected methods inherited from Exception class
    public function getMessage();                 // Exception message
    public function getCode();                    // User-defined Exception code
    public function getFile();                    // Source filename
    public function getLine();                    // Source line
    public function getTrace();                   // An array of the backtrace()
    public function getTraceAsString();           // Formated string of trace
   
    // Overrideable methods inherited from Exception class 
    public function __toString();                 // formatted string for display
    public function __construct($message = null, $code = 0);
}


//------------------------------------------------------------------------
abstract class custom_exception extends Exception implements IException {
    protected $message = 'Unknown exception';     // Exception message
    private   $string;                            // Unknown
    protected $code    = 0;                       // User-defined exception code
    protected $file;                              // Source filename of exception
    protected $line;                              // Source line of exception
    private   $trace;                             // Unknown

    //--------------------------------------------------------
    public function __construct($message = null, $code = 0) {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);
    }

    //--------------------------
    public function __toString() {
        return get_class($this) . " '{$this->message}' in {$this->file}({$this->line})\n"
                                . "{$this->getTraceAsString()}";
    }
}
?>
