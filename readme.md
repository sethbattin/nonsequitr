= NonSequitr =
Contributors: solo
Donate link: https://donate.wikimedia.org/w/index.php?title=Special:FundraiserLandingPage
Tags: article, aside
Requires at least: 2.5
Tested up to: 3.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin is meant to wrap up sections of text that don't have anything to do with the rest of the article.

== Description ==

This plugin is meant to keep articles more concise and on-topic by creating a way to hide rambling sections.  These non sequitur parts are contained within a div and hidden, and able to be revealed by document events.  At a bare minimum, the shortcode will work without javascript using link inline onclick events.  Higher-quality reveals may be achieved through extra javascript and css.

The plugin's name has several layered meanings.  The pronounciation matches the actual intended term, 'non sequitur', while being only one character away from it for easy spelling auto correction.  It is also only one letter away from the common misspelling, 'non sequiter'.  For people who can't even get that close, it features the modern branding technique of dropping arbitrary vowels from a word ("flickr", "tumblr", "illegalactivityfacilitatr.com").  But for the astute reader, it jars the reading flow sufficiently to bring out the sound and meaning "quitter", which is its intended purpose.

== Installation ==

Place the folder in the plugins directory, (activate it,) and use the shortcode:

    [nonsequitr] {non sequitur content} [/nonsequiter]
    
The shortcode allows some options, but I haven't thought of what they should be yet.  Except this one:

    [nonsequitr type="default" /]
    // sets the "tone" of the hidden text.  Might be "rant", "left-field", "tangent", etc.

