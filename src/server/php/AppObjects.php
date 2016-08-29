<?php
// vim: set tabstop=4 shiftwidth=4 autoindent smartindent expandtab:
//---------------------------------------------------------
// CAPTAIN  SLOG
//---------------------------------------------------------
//
//  FILE:       app_objects.php    
//  SYSTEM:     C3I 
//  AUTHOR:     Mark Addinall
//  DATE:       16/03/2016
//  SYNOPSIS:   This file contains the object that will 
//              encapsulate general application objects in use.
//              This file changes per development, howver
//              most objects can be found in common systems
//              that have people and organisations.
//
//              This file has seen some major re-use over
//              the years.  Apart from the quicktools suite,
//              this file has been part of the Chameleon CMS
//              and several specific applications, ACCLOUD
//              accounting, What's Mine (Mining industry ERP
//              and assett management) and BetMe, a horce racing
//              statistical data gathering and reporting application
//              to name a few.
//
//
//-----------------------------------------------------------------------------
//  Copyright (c) 2013..2016, Mark Addinall - That's IT - QLD
//  All rights reserved.
//
//  Redistribution and use in source and binary forms, with or without
//  modification, are permitted provided that the following conditions are met:
//      * Redistributions of source code must retain the above copyright
//        notice, this list of conditions and the following disclaimer.
//      * Redistributions in binary form must reproduce the above copyright
//        notice, this list of conditions and the following disclaimer in the
//        documentation and/or other materials provided with the distribution.
//      * Neither the name of That's IT, Mark Addinall, nor the
//        names of its contributors may be used to endorse or promote products
//        derived from this software without specific prior written permission.
//
//  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
//  ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
//  WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
//  DISCLAIMED. IN NO EVENT SHALL Mark Addinall BE LIABLE FOR ANY
//  DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
//  (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
//  LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
//  ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
//  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
//  SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
//
//
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


// classes.
?>

