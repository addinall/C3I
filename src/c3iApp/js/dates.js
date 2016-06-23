// vim: set tabstop=4 shiftwidth=4 autoindent expandtab:
//---------------------------------------------------------
// CAPTAIN  SLOG
//---------------------------------------------------------
//
//  FILE:       dates.js
//  SYSTEM:     C3I Client side date handler 
//  AUTHOR:     Mark Addinall
//  DATE:       28/05/2016
//  SYNOPSIS:   I ripped this out of my 2016 toolset and adapted it to work  
//              with C3I.
//             
//             
// The Module Pattern is what is called a “design pattern”, and it’s extremely useful 
// for a number of reasons. The attraction of the Module Pattern (and it’s variant, 
// the Revealing Module Pattern, the one we use) are that it makes scoping simple, 
// provides a clean way to implement a namespace, and doesn’t overcomplicate JavaScript design.
//
// It also keeps things very simple and easy to read and use, uses Objects in a very 
// nice way, and doesn’t bloat your code with repetitive this and prototype declarations.

    //------------------------------
    var c3iDate = (function() {

        // if you look down the bottom of this design pattern you will see the functions
        // we are making available to the outside world by declaring them in our
        // return clause.  Everything else is PRIVATE and will trigger a runtime
        // exception if an application coder tries to access and METHODS or PROPERTIES
        // not defined as PUBLIC.
        //
        //      c3iDATE`.function_name(parameter_list, ...);
        //

        var     date_store = {};                                         // common storage object PRIVATE

        // In Javascript, times are stored as the number of milliseconds
        // since the EPOCH, Midnight, January 1, 1970.  Dates prior to
        // that are not internally represented.  This makes the manipulation
        // of dates rather easy, a fact lost on most coders it seems.

           date_store.SECONDS           = 1000;                              // millisecs
           date_store.MINUTES           = date_store.SECONDS    * 60;
           date_store.HOURS             = date_store.MINUTES    * 60;
           date_store.DAYS              = date_store.HOURS      * 24;
           date_store.WEEKS             = date_store.DAYS       *  7;

           date_store.date_to           = new moment();
           date_store.date_from         = new moment();
           date_store.today             = new moment();

           date_store.timer             = null;
           date_store.format.human      = "DD-MM-YYYY  HH:mm:ss";;
           date_store.format.machine    = "YYYY-MM-DD  HH:mm:ss";;
           date_store.offset       = 5;                                 // minutes in the PAST
                 


        //--------------------------------------
        var fetch_offset_minutes = function() {

            return date_store.offset;
        }


        //------------------------------
        var update_clocks = function() {
           
            // update the clocks every second
            // When in usual mode, this system fetches data and displays it
            // from a moving temporal window of NOW - TIME_PERIOD_OFFSET
            // This function displays the two TIMESTAMPS

            $("#datefromval").html(date_store_from().subtract(date_store.offset,"minutes").format(date_store.format.human));
            $("#datetoval").html(date_store_to().format(date_store.format.human));
        }


        //----------------------------------
        var start_clock = function() {

            date_store.timer = setInterval(update_clocks, 1000);    // tick tock every second

        }

        //-------------------------------
        var stop_clock = function() {

            clearInterval(date_store.timer);

        }


        //---------------------------------
        var calculate_dates  = function() {

            // Something happened in the outside world that wants us
            // to recalculate out date information!  This will usually be
            // an end user clicking on a SHOW ME UNTIL button or a
            // calendar request.  To avoid repeated calculations, we
            // store stuff to hand back to the PROPERTY requestors.
            //
            // The offset is a duration backwards in time, expressed in minutes.

            stop_clock();                                               // we have two clocks in the system
                                                                        // at the moment.  In a normal operation
                                                                        // they both tick.  One is ALWAYS NOW()
                                                                        // in this mode, and one is ALWAYS
                                                                        // NOW() - minutes.


            if (offset > 0) {                                           // NOT a custom timer

                date_store.date_from.subtract(date_store.offset, 'minutes');
                start_clock();

            } else {                                                    // IS a CUSTOM time period
                // we don't need to do anything at all
            }
        }


        //-----------------------------------
        var set_offset = function(how_namy) {

            // store the amount of time we wish to peer into the past!

            date_store.offset = how_many;           // minutes
        }


        //------------------------------
        var fetch_date_to = function() {

            // return the date to value
    
            return(date_store.date_to.format(date_store.format.machine));

        }

        //---------------------------------
        var fetch_date_from = function() {

            // return the date to value

            return(date_store.date_from.format(date_store.format.machine));

        }


        //-----------------------------------------
        var set_custom_dates = function(to, from) {

            date_store.date_to(to, date_store.format.machine);                  // set the two clocks
            date_store.date_from(from, date_store.format).machine;              // with the correct times
        }

        //------
        return {                                                                // whatever me make visible here is the
                                                                                // MODULE API
            fetch_date_to           : fetch_date_to,                            // this is USUALLY NOW()
            fetch_date_from         : fetch_date_from,                          // this can be FIXED or ticking.NOW() - offset minutes
            fetch_offset_minutes    : fetch_offset_minutes,                     // return the peek into the past amount - offset minutes
            set_offset              : set_offset,                               // set the time offset minutes
            set_custom_dates        : set_custom_dates,                         // set two fixed dates
            calculate_dates         : calculate_dates                           // re-calculate our clocks

        }

    })();                                                                       // MODULE c3iDATE namespace


// ------   EOF -------------


