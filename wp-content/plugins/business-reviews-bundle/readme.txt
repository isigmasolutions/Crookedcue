=== Business Reviews Bundle ===
Contributors: richplugins
Donate link: https://richplugins.com/
Tags: google, facebook, yelp, google reviews, facebook reviews, yelp reviews, reviews, ratings, business reviews, rich snippets
Requires at least: 2.8
Tested up to: 5.4
Stable tag: 1.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Business Reviews Bundle is a WordPress plugin to merges and displays any reviews from Google, Facebook and Yelp in the single feed.

== Description ==

== Installation ==

1. Unpack archive to this archive to the 'wp-content/plugins/' directory inside of WordPress
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

<h4>1.6</h4>
<ul>
    <li>Improve: Upgrade Facebook API to v7.0</li>
    <li>Bugfix: GDPR short last name in the title and alt</li>
    <li>Bugfix: separate reviews for different trust badges</li>
    <li>Bugfix: empty post actions row in a collection list</li>
    <li>Bugfix: line breaks in the Facebook reviews</li>
</ul>

<h4>1.5.9</h4>
<ul>
    <li>Bugfix: corrected the rating calculation for merged empty places</li>
</ul>

<h4>1.5.8</h4>
<ul>
    <li>Improve checking of outgoing HTTP(S) requests</li>
    <li>Bugfix: Facebook connection without cross-site cookies</li>
    <li>Bugfix: change size of the star icon in wp menu</li>
</ul>

<h4>1.5.7</h4>
<ul>
    <li>Bugfix: multiple account selection</li>
    <li>Bugfix: empty count PHP error</li>
</ul>

<h4>1.5.6</h4>
<ul>
    <li>Bugfix: GMB accounts list API may return more than 20 elements</li>
    <li>Bugfix: absent closing svg tags in badges</li>
</ul>

<h4>1.5.5</h4>
<ul>
    <li>Improve performance: added svg defs to reuse the elements</li>
    <li>Improve: updated for WP 5.3</li>
</ul>

<h4>1.5.4</h4>
<ul>
    <li>Improve: added dots for read more link</li>
    <li>Improve: added width, height, title for img elements (SEO)</li>
    <li>Bugfix: increase limit of the locations in GMB API</li>
    <li>Bugfix: little css fix with a wpcontent padding in Collection Builder</li>
    <li>Bugfix: rplg.js/_rplg_get_parent braces in the empty loop to fix the error in the WP Faster Cache plugin</li>
</ul>

<h4>1.5.3</h4>
<ul>
    <li>Bugfix: 404 link to all reviews page for some places</li>
</ul>

<h4>1.5.2</h4>
<ul>
    <li>Bugfix: full width for embed badges</li>
</ul>

<h4>1.5.1</h4>
<ul>
    <li>Improve: option to hide close button for float badges</li>
    <li>Improve: rel="noopener" attribute for target="_blank" links</li>
    <li>Improve: help information for several options in the collection builder</li>
    <li>Bugfix: remove rplgsw.min.js.map file from slider</li>
</ul>

<h4>1.5</h4>
<ul>
    <li>Improve: added new locale bg_BG</li>
    <li>Bugfix: incorrect rendering the float Yelp rating</li>
</ul>

<h4>1.4.9</h4>
<ul>
    <li>Bugfix: fix the business name layout</li>
</ul>

<h4>1.4.8</h4>
<ul>
    <li>Improve: customized rating template (Reviews Options/Theme/Rating template)</li>
    <li>Improve: added close icon for a float badges</li>
    <li>Bugfix: trim text function without close space</li>
</ul>

<h4>1.4.7</h4>
<ul>
    <li>Improve: hide 'Translated by Google' text part</li>
    <li>Improve: added new layout 'List: thin'</li>
    <li>Bugfix: broken Google's profile photo</li>
</ul>

<h4>1.4.6</h4>
<ul>
    <li>Bugfix: fixed the close button in a left reviews sidebar</li>
</ul>

<h4>1.4.5</h4>
<ul>
    <li>Improve: added separate option for Google's reviews limit</li>
    <li>Bugfix: some style fixes</li>
</ul>

<h4>1.4.4</h4>
<ul>
    <li>Improve: delete all collections for reset all and re-install from scratch</li>
    <li>Improve: added new locale de_DE_formal</li>
    <li>Bugfix: GMB API reviews limit parameter</li>
    <li>Bugfix: style fixes</li>
</ul>

<h4>1.4.3</h4>
<ul>
    <li>Improve: possibility connect multiple GMB owner accounts</li>
</ul>

<h4>1.4.2</h4>
<ul>
    <li>Improve: show empty businesses</li>
    <li>Improve: custom plugin updater for network admin (multi-site)</li>
    <li>Improve: loads assets on demand</li>
    <li>Improve: minify and assemble single bundles for assets</li>
</ul>

<h4>1.4.1</h4>
<ul>
    <li>Improve: added new locale sv_SE</li>
    <li>Bugfix: change content-type to application/javascript for ajax version</li>
    <li>Bugfix: rating locale messages</li>
</ul>

<h4>1.4</h4>
<ul>
    <li>Improve: added option to calculate the Facebook rating based on current reviews</li>
</ul>

<h4>1.3.9</h4>
<ul>
    <li>Bugfix: Facebook zero rating count fix</li>
</ul>

<h4>1.3.8</h4>
<ul>
    <li>Bugfix: Facebook float rating</li>
</ul>

<h4>1.3.7</h4>
<ul>
    <li>Improve: update the Facebook Rating API to show correct reviews count</li>
    <li>Improve: added new locale ru</li>
</ul>

<h4>1.3.6</h4>
<ul>
    <li>Bugfix: corrected URL protocol for business image</li>
    <li>Bugfix: fixed 'Use Google Places API' checkbox</li>
</ul>

<h4>1.3.5</h4>
<ul>
    <li>Bugfix: minimum character filter for empty Google reviews</li>
</ul>

<h4>1.3.4</h4>
<ul>
    <li>Improve: added feature to working with multiple Google Business accounts</li>
    <li>Improve: added new locale fi_FI</li>
    <li>Improve: added new locale he_IL</li>
    <li>Bugfix: empty summary rating</li>
</ul>

<h4>1.3.3</h4>
<ul>
    <li>Improve: Google My Business API integrated to get all reviews</li>
    <li>Improve: added a reviewer avatar size option</li>
    <li>Bugfix: get_current_screen undefined</li>
    <li>Bugfix: broken schema rating due auto paragraph in shortcode</li>
    <li>Bugfix: activator works with version specified updates</li>
</ul>

<h4>1.3.2</h4>
<ul>
    <li>Improve: added a reviews count for Google from the Places API</li>
</ul>

<h4>1.3.1</h4>
<ul>
    <li>Improve: rounding stars (rating) to the boundary values</li>
    <li>Bugfix: check support multibyte strings in PHP</li>
</ul>

<h4>1.3</h4>
<ul>
    <li>Improve: new option to trim last name (GDRP)</li>
    <li>Improve: new option to hide reviewer names</li>
    <li>Improve: reduce reviewer profile photos to 100x100 (ms.jpg)</li>
    <li>Bugfix: fixed problem with adaptive header rows</li>
    <li>Bugfix: broken slider in FireFox</li>
</ul>

<h4>1.2.9</h4>
<ul>
    <li>Improve: added new locale hu_HU</li>
    <li>Improve: update user picture dimension to 120x120</li>
    <li>Improve: use Graph API with picture and open_graph_story</li>
    <li>Bugfix: emoji characters fix in set_transient</li>
    <li>Bugfix: collection builder options init</li>
</ul>

<h4>1.2.8</h4>
<ul>
    <li>Bugfix: fixed problem with Facebook avatars</li>
</ul>

<h4>1.2.7</h4>
<ul>
    <li>Improve: added reviews limit parameter</li>
    <li>Improve: added Facebook Ratings API limit parameter</li>
    <li>Bugfix: badge click mode</li>
    <li>Bugfix: rich snippets itemprop name for badge theme</li>
    <li>Bugfix: the embed badge form is rendering correctly</li>
</ul>

<h4>1.2.6</h4>
<ul>
    <li>Improve: more information about license and renewal</li>
</ul>

<h4>1.2.5</h4>
<ul>
    <li>Improve: trust badges returned with directly showing reviews on the site into the sidebar</li>
    <li>Improve: Migration tool for import reviews from old Google Business and Yelp Pro plugins</li>
</ul>

<h4>1.2.4</h4>
<ul>
    <li>Bugfix: zero value in the reviews count</li>
    <li>Bugfix: undefined $this in the register_widget for old PHP versions</li>
    <li>Bugfix: debug information shows reviews table</li>
    <li>Bugfix: debug information contains collections</li>
</ul>

<h4>1.2.3</h4>
<ul>
    <li>Badge style fixes</li>
</ul>

<h4>1.2.2</h4>
<ul>
    <li>Added languages: cz (Czech), sk (Slovak)</li>
</ul>

<h4>1.2.1</h4>
<ul>
    <li>Feature: added 'Striped' sorting</li>
    <li>Bugfix: slider responsive</li>
</ul>

<h4>1.2</h4>
<ul>
    <li>New feature: possibility to display reviews through HTML/JS code on non-WordPress sites, for instance HTML Landing Page</li>
</ul>

<h4>1.1</h4>
<ul>
    <li>Improve Facebook connection: possibility to select specific FB page</li>
    <li>Added FAQ questions</li>
    <li>Added languages: ca, dk, de, es, fr, no, nl, tr</li>
    <li>Bugfix</li>
</ul>

== Support ==

* Email support support@richplugins.com
* Live support https://richplugins.com/forum
