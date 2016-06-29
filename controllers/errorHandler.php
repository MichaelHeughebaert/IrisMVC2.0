<?php

namespace controllers;

use libs\Controller;

class ErrorHandler extends Controller
{
    /**
     * Renders the Error index view
     */
    public function index()
    {
        $quotes = array(
            "I've got a feeling we're not in Kansas anymore.|Dorothy, The Wizard of Oz (1939)",
            "What we've got here is... failure to communicate.|Captain, Cool Hand Luke (1967)",
            "This is not the webpage you're looking for.|Obi-Wan, Star Wars: Episode IV - A New Hope (1977)",
            "Someday we'll find it...the website connection...|Kermit the Frog, The Muppet Movie (1979)",
            "Surely you can't be serious! I am serious. And don't call me Shirley.|Ted Striker & Rumack, Airplane! (1980)",
            "Webpages? Where we're going, we don't need webpages|Dr. Emmett Brown, Back to the future (1985)",
            "Page not found? INCONCEIVABLE.|Vizzini, The Princess Bride (1987)",
            "Well, what if there is no webpage? There wasn't one today.|Phil Connors, Groundhog Day (1993)",
            "Lord! It's a miracle! Webpage up and vanished like a fart in the wind!|Warden Norton, The Shawshank Redemption (1994)",
            "It's the one that says 'Page not found'.?!|Jules Winnfield, Pulp Fiction (1994)",
            "What's on the page?!|Detective David Mills, Se7en (1995)",
            "Where's the page, Lebowski? Where's the page?|Blond Thug, The Big Lebowski (1998)",
            "Yeah... I'm gonna need you to go ahead and find another Page.|Bill Lumbergh, Office Space (1999)",
            "I am Jack's missing page.|The Narrator, Fight Club (1999)",
            "There is no page.|Spoon Boy, The Matrix (1999)",
            "Dude, where's my webpage?|Jesse Montgomery III, Dude, Where's My Car (2000)",
            "Always remember, Frodo, the page is trying to get back to it's master. It wants to be found|Gandalf, The lord of the Rings: The fellowship of the Ring (2001)",
            "He's off the map! He's off the map!|Stan, Eternal Sunshine of the Spotless Mind (2004)"
        );

        $this->view->quotes = $quotes;
        $this->view->title = '404 Foutpagina';
        $this->view->render('errorhandler/index');
    }
}