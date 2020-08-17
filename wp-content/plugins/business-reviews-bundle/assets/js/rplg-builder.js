var HTML_CONTENT = '' +
    '<div class="rplg-builder-platform rplg-platform-google">' +
        '<div class="rplg-builder-top rplg-toggle">Google Reviews</div>' +
        '<div class="rplg-builder-inside" style="display:none">' +
            '{google_connect}' +
            '<div style="display:none">' +
                '<div class="rplg-builder-option">' +
                    '<input type="text" class="rplg-connect-id" value="" placeholder="Place ID: ChIJ..." />' +
                    '<span class="rplg-quest rplg-toggle" title="Click to help">?</span>' +
                    '<div class="rplg-quest-help">Enter Place ID of your Google business. If you don\'t know this, you can simply find it by <a href="https://www.launch2success.com/guide/find-any-google-id/" target="_blank">this instruction</a>. It should look like ChIJ...</div>' +
                '</div>' +
                '<div class="rplg-builder-option">' +
                    '<select class="rplg-connect-lang">' +
                        '<option value="">All languages</option>' +
                        '<option value="ar">Arabic</option>' +
                        '<option value="bg">Bulgarian</option>' +
                        '<option value="bn">Bengali</option>' +
                        '<option value="ca">Catalan</option>' +
                        '<option value="cs">Czech</option>' +
                        '<option value="da">Danish</option>' +
                        '<option value="de">German</option>' +
                        '<option value="el">Greek</option>' +
                        '<option value="en">English</option>' +
                        '<option value="en-AU">English (Australian)</option>' +
                        '<option value="en-GB">English (Great Britain)</option>' +
                        '<option value="es">Spanish</option>' +
                        '<option value="eu">Basque</option>' +
                        '<option value="eu">Basque</option>' +
                        '<option value="fa">Farsi</option>' +
                        '<option value="fi">Finnish</option>' +
                        '<option value="fil">Filipino</option>' +
                        '<option value="fr">French</option>' +
                        '<option value="gl">Galician</option>' +
                        '<option value="gu">Gujarati</option>' +
                        '<option value="hi">Hindi</option>' +
                        '<option value="hr">Croatian</option>' +
                        '<option value="hu">Hungarian</option>' +
                        '<option value="id">Indonesian</option>' +
                        '<option value="it">Italian</option>' +
                        '<option value="iw">Hebrew</option>' +
                        '<option value="ja">Japanese</option>' +
                        '<option value="kn">Kannada</option>' +
                        '<option value="ko">Korean</option>' +
                        '<option value="lt">Lithuanian</option>' +
                        '<option value="lv">Latvian</option>' +
                        '<option value="ml">Malayalam</option>' +
                        '<option value="mr">Marathi</option>' +
                        '<option value="nl">Dutch</option>' +
                        '<option value="no">Norwegian</option>' +
                        '<option value="pl">Polish</option>' +
                        '<option value="pt">Portuguese</option>' +
                        '<option value="pt-BR">Portuguese (Brazil)</option>' +
                        '<option value="pt-PT">Portuguese (Portugal)</option>' +
                        '<option value="ro">Romanian</option>' +
                        '<option value="ru">Russian</option>' +
                        '<option value="sk">Slovak</option>' +
                        '<option value="sl">Slovenian</option>' +
                        '<option value="sr">Serbian</option>' +
                        '<option value="sv">Swedish</option>' +
                        '<option value="ta">Tamil</option>' +
                        '<option value="te">Telugu</option>' +
                        '<option value="th">Thai</option>' +
                        '<option value="tl">Tagalog</option>' +
                        '<option value="tr">Turkish</option>' +
                        '<option value="uk">Ukrainian</option>' +
                        '<option value="vi">Vietnamese</option>' +
                        '<option value="zh-CN">Chinese (Simplified)</option>' +
                        '<option value="zh-TW">Chinese (Traditional)</option>' +
                    '</select>' +
                '</div>' +
                '<div class="rplg-builder-option">' +
                    '<input type="text" class="rplg-connect-key" value="' + BRB_VARS.googleAPIKey + '" placeholder="Google Places API Key: AIzaS..." />' +
                    '<span class="rplg-quest rplg-toggle" title="Click to help">?</span>' +
                    '<div class="rplg-quest-help"><a href="' + BRB_VARS.settingsUrl + '&brb_tab=google" target="_blank">How to create Google Places API key</a></div>' +
                '</div>' +
                '<div class="rplg-builder-option">' +
                    '<button class="rplg-connect-btn">Connect Google</button>' +
                    '<small class="rplg-connect-error"></small>' +
                '</div>' +
            '</div>' +
            '<div class="rplg-connection-checkbox">' +
                '<label><input type="checkbox"/> Select all Google places</label>' +
            '</div>' +
            '<div class="rplg-connections"></div>' +
        '</div>' +
    '</div>' +

    '<div class="rplg-builder-platform rplg-platform-facebook">' +
        '<div class="rplg-builder-top rplg-toggle">Facebook Reviews</div>' +
        '<div class="rplg-builder-inside" style="display:none">' +
            '<button class="rplg-builder-connect rplg-connect-facebook">Connect Facebook</button>' +
            '<div class="rplg-connection-checkbox">' +
                '<label><input type="checkbox"/> Select all Facebook pages</label>' +
            '</div>' +
            '<div class="rplg-connections"></div>' +
        '</div>' +
    '</div>' +

    '<div class="rplg-builder-platform rplg-platform-yelp">' +
        '<div class="rplg-builder-top rplg-toggle">Yelp Reviews</div>' +
        '<div class="rplg-builder-inside" style="display:none">' +
            '<div class="rplg-toggle rplg-builder-connect rplg-connect-yelp">Connect Yelp</div>' +
            '<div style="display:none">' +
                '<div class="rplg-builder-option">' +
                    '<input type="text" class="rplg-connect-id" value="" placeholder="Link to business on Yelp: https://www.yelp.com/biz/..." />' +
                    '<span class="rplg-quest rplg-toggle" title="Click to help">?</span>' +
                    '<div class="rplg-quest-help">For instance: <b>https://www.yelp.com/biz/benjamin-steakhouse-new-york-2</b></div>' +
                '</div>' +
                '<div class="rplg-builder-option">' +
                    '<select class="rplg-connect-lang">' +
                        '<option value="">All languages</option>' +
                        '<option value="cs_CZ">Czech Republic: Czech</option>' +
                        '<option value="da_DK">Denmark: Danish</option>' +
                        '<option value="de_AT">Austria: German</option>' +
                        '<option value="de_CH">Switzerland: German</option>' +
                        '<option value="de_DE">Germany: German</option>' +
                        '<option value="en_AU">Australia: English</option>' +
                        '<option value="en_BE">Belgium: English</option>' +
                        '<option value="en_CA">Canada: English</option>' +
                        '<option value="en_CH">Switzerland: English</option>' +
                        '<option value="en_GB">United Kingdom: English</option>' +
                        '<option value="en_HK">Hong Kong: English</option>' +
                        '<option value="en_IE">Republic of Ireland: English</option>' +
                        '<option value="en_MY">Malaysia: English</option>' +
                        '<option value="en_NZ">New Zealand: English</option>' +
                        '<option value="en_PH">Philippines: English</option>' +
                        '<option value="en_SG">Singapore: English</option>' +
                        '<option value="en_US">United States: English</option>' +
                        '<option value="es_AR">Argentina: Spanish</option>' +
                        '<option value="es_CL">Chile: Spanish</option>' +
                        '<option value="es_ES">Spain: Spanish</option>' +
                        '<option value="es_MX">Mexico: Spanish</option>' +
                        '<option value="fi_FI">Finland: Finnish</option>' +
                        '<option value="fil_PH">Philippines: Filipino</option>' +
                        '<option value="fr_BE">Belgium: French</option>' +
                        '<option value="fr_CA">Canada: French</option>' +
                        '<option value="fr_CH">Switzerland: French</option>' +
                        '<option value="fr_FR">France: French</option>' +
                        '<option value="it_CH">Switzerland: Italian</option>' +
                        '<option value="it_IT">Italy: Italian</option>' +
                        '<option value="ja_JP">Japan: Japanese</option>' +
                        '<option value="ms_MY">Malaysia: Malay</option>' +
                        '<option value="nb_NO">Norway: Norwegian</option>' +
                        '<option value="nl_BE">Belgium: Dutch</option>' +
                        '<option value="nl_NL">The Netherlands: Dutch</option>' +
                        '<option value="pl_PL">Poland: Polish</option>' +
                        '<option value="pt_BR">Brazil: Portuguese</option>' +
                        '<option value="pt_PT">Portugal: Portuguese</option>' +
                        '<option value="sv_FI">Finland: Swedish</option>' +
                        '<option value="sv_SE">Sweden: Swedish</option>' +
                        '<option value="tr_TR">Turkey: Turkish</option>' +
                        '<option value="zh_HK">Hong Kong: Chinese</option>' +
                        '<option value="zh_TW">Taiwan: Chinese</option>' +
                    '</select>' +
                '</div>' +
                '<div class="rplg-builder-option">' +
                    '<input type="text" class="rplg-connect-key" value="' + BRB_VARS.yelpAPIKey + '" placeholder="Yelp API Key" />' +
                    '<span class="rplg-quest rplg-toggle" title="Click to help">?</span>' +
                    '<div class="rplg-quest-help">' +
                        '<b>How to create Yelp API Key:</b>' +
                        '<ul>' +
                            '<li>1. If you do not have a <b>free Yelp account</b> (not a business), please <a href="https://www.yelp.com/signup" target="_blank">Sign Up Here</a></li>' +
                            '<li>2. Under the free Yelp account, go to the <a href="https://www.yelp.com/developers/v3/manage_app" target="_blank">Yelp developers</a> page and create new app</li>' +
                            '<li>3. Copy <b>API Key</b> to this setting and <b>Save</b></li>' +
                            '<li>Video instruction on <a href="https://www.youtube.com/watch?v=GFhGN36Wf7Q" target="_blank">YouTube</a></li>' +
                        '</ul>' +
                    '</div>' +
                '</div>' +
                '<div class="rplg-builder-option">' +
                    '<button class="rplg-connect-btn">Connect Yelp</button>' +
                    '<small class="rplg-connect-error"></small>' +
                '</div>' +
            '</div>' +
            '<div class="rplg-connections"></div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    'Yelp API is limited to 3 reviews' +
                '</label>' +
                '<span class="rplg-quest rplg-quest-top rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help">The plugin uses the Yelp API to get your reviews. The API only returns the 3 most helpful reviews. When Yelp changes the 3 most helpful the plugin will automatically add the new one to your database. Thus slowly building up a database of reviews. It\'s a limitation of Yelp, not specifically the plugin.</div>' +
            '</div>' +
        '</div>' +
    '</div>' +

    '<div class="rplg-connect-options">' +

        '<div class="rplg-builder-top rplg-toggle">Header Options</div>' +
        '<div class="rplg-builder-inside" style="display:none">' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input id="summary_rating" type="checkbox" name="summary_rating" value="" class="rplg-toggle">Show summary rating' +
                    '<div class="rplg-well" onclick="if(event.target.type != \'file\')return false">' +
                        '<div class="rplg-builder-option">' +
                            '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="rplg-connect-photo" onload="var el = this.parentNode.parentNode; if (window.summary_rating.checked) { el.style=\'display: block\'; } else { el.style=\'display: none\'; }">' +
                            '<a href="#" class="rplg-connect-photo-change" onclick="var file_frame;rplg_upload_photo(this.parentNode, file_frame, function() { rplg_serialize_connections(); });return false;">Summary business photo</a>' +
                            '<input type="hidden" name="summary_photo" value="" class="rplg-connect-photo-hidden" tabindex="2">' +
                            '<input type="file" tabindex="-1" accept="image/*" onchange="rplg_upload_image(this.parentNode, this.files)" style="display:none!important">' +
                        '</div>' +
                        '<div class="rplg-builder-option">' +
                            '<input type="text" name="summary_name" value="" placeholder="Summary business name">' +
                        '</div>' +
                        '<div class="rplg-builder-option">' +
                            '<input type="text" name="summary_url" value="" placeholder="Summary business link">' +
                        '</div>' +
                    '</div>' +
                '</label>' +
                '<span class="rplg-quest rplg-quest-top rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help">The option combines all connected businesses to a single (summary) header and show a merged rating, it makes sense only if you have connected more than 1 business.</div>' +
            '<div class="rplg-connections"></div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="header_hide_photo" value="">' +
                    'Hide business photo' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="header_hide_name" value="">' +
                    'Hide business name' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="header_hide_count" value="">' +
                    'Hide reviews count' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="header_hide_seeall" value="">' +
                    'Hide \'See All Reviews\' link' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="header_hide_write" value="">' +
                    'Hide \'Write a Review\' link' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="header_merge_social" value="">' +
                    'Merge social ratings' +
                '</label>' +
                '<span class="rplg-quest rplg-quest-top rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help">The option groups the same connected businesses to a summary headers. For instance, if you connected three Google places and two Facebook pages, it will merge 3 Google places in the first header and 2 Facebook in the second and show two ratings instead of five.</div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="header_hide_social" value="">' +
                    'Hide social ratings' +
                '</label>' +
                '<span class="rplg-quest rplg-quest-top rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help">The option hides all socials (Google, Facebook and Yelp) headers. Makes sense only if you have a lot of many connected businesses in the collection and you enabled a summary rating to combine these all to one.</div>' +
            '</div>' +
        '</div>' +

        '<div class="rplg-builder-top rplg-toggle">Reviews Options</div>' +
        '<div class="rplg-builder-inside" style="display:none">' +
            '<div class="rplg-builder-option">' +
                'Theme' +
                '<select id="view_mode" name="view_mode">' +
                    '<option value="list" selected="selected">List</option>' +
                    '<option value="list_thin">List: thin</option>' +
                    '<option value="grid4">Grid: 4 columns</option>' +
                    '<option value="grid3">Grid: 3 columns</option>' +
                    '<option value="grid2">Grid: 2 columns</option>' +
                    '<option value="slider">Slider</option>' +
                    '<option value="badge_inner">Badge: embed</option>' +
                    '<option value="badge_left">Badge: float left</option>' +
                    '<option value="badge">Badge: float right</option>' +
                    '<option value="temp">Rating template</option>' +
                '</select>' +
            '</div>' +
            '<div id="rating_temp_cnt" class="rplg-builder-option">' +
                'Rating template' +
                '<textarea id="rating_temp" name="rating_temp" placeholder="' +
                    '<span class=&#34;rplg-rating&#34;>\n' +
                    '  {{photo}}\n' +
                    '  <a href=&#34;javascript:_rplg_popup(\'{{writereview_url}}\',620,580)&#34;>\n' +
                    '    {{name}}\n' +
                    '  </a>\n' +
                    '  <span{{aggr}}>\n' +
                    '    {{stars}}\n' +
                    '    <span class=&#34;rplg-rating-info&#34;>\n' +
                    '      {{rating}} Stars - \n' +
                    '      <a href=&#34;{{reviews_url}}&#34; target=&#34;_blank&#34;>\n' +
                    '        {{count}} Reviews\n' +
                    '      </a>\n' +
                    '    </span>\n' +
                    '  </span>\n' +
                    '</span>' +
                '"></textarea>' +
                '<span class="rplg-quest rplg-quest-top22 rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help">' +
                    'The layout for a custom template, you can use following variables:<br>' +
                    '<b>{{name}}</b> - business name<br>' +
                    '<b>{{photo}}</b> - business photo<br>' +
                    '<b>{{aggr}}</b> - aggregateRating markup<br>' +
                    '<b>{{stars}}</b> - stars<br>' +
                    '<b>{{rating}}</b> - business rating<br>' +
                    '<b>{{count}}</b> - reviews count<br>' +
                    '<b>{{reviews_url}}</b> - all reviews url<br>' +
                    '<b>{{writereview_url}}</b> - write a reviews url<br><br>' +
                    'Example template: ' +
                    '<pre style="margin:0">' +
                    '&lt;span class=&#34;rplg-rating&#34;&gt;\n' +
                    '   &lt;span{{aggr}}&gt;\n' +
                    '       &lt;span class=&#34;rating&#34;&gt;\n' +
                    '           {{rating}}\n' +
                    '       &lt;/span&gt;\n' +
                    '       {{stars}}\n' +
                    '       &lt;span class=&#34;rplg-rating-info&#34;&gt;\n' +
                    '           Based on \n' +
                    '           &lt;a href=&#34;{{writereview_url}}&#34;&gt;\n' +
                    '               {{count}} reviews\n' +
                    '           &lt;/a&gt;\n' +
                    '       &lt;/span&gt;\n' +
                    '   &lt;/span&gt;\n' +
                    '&lt;/span&gt;\n' +
                    '&lt;style&gt;\n' +
                    '.rplg .rating {\n' +
                    '   vertical-align:middle!important;\n' +
                    '   margin-right:5px!important;\n' +
                    '}\n' +
                    '&lt;/style&gt;' +
                    '</pre>' +
                '</div>' +
                '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" onload="' +
                    'window.rating_temp_cnt.style.display = (window.view_mode.value == \'temp\' ? \'block\' : \'none\');' +
                    'window.view_mode.onchange = function() {' +
                        'window.rating_temp_cnt.style.display = (this.value== \'temp\' ? \'block\' : \'none\');' +
                        'window.rating_temp.focus();' +
                    '}" ' +
                'style="display:none">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Sorting' +
                '<select id="sort" name="sort">' +
                    '<option value="1" selected="selected">Most recent</option>' +
                    '<option value="2">Most oldest</option>' +
                    '<option value="3">Highest score</option>' +
                    '<option value="4">Lowest score</option>' +
                    '<option value="5">Random</option>' +
                    '<option value="6">Striped</option>' +
                '</select>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Minimum Rating' +
                '<select id="min_filter" name="min_filter">' +
                    '<option value="" selected="selected">No minimum rating</option>' +
                    '<option value="5">5 Stars</option>' +
                    '<option value="4">4 Stars</option>' +
                    '<option value="3">3 Stars</option>' +
                    '<option value="2">2 Stars</option>' +
                    '<option value="1">1 Star</option>' +
                '</select>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Included words filter' +
                '<input type="text" name="word_filter" value="">' +
                '<span class="rplg-quest rplg-quest-top22 rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help">' +
                    'Will show reviews only with this words or author names, for instance: John Doe, great steakhouse, coffe (through comma, case-sensitive)' +
                '</div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Excluded words filter' +
                '<input type="text" name="word_exclude" value="">' +
                '<span class="rplg-quest rplg-quest-top22 rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help">' +
                    'Will remove reviews only with this words or author names, for instance: John Doe, great steakhouse, coffe (through comma, case-sensitive)' +
                '</div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Pagination' +
                '<input type="text" name="pagination" value="">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Minimum characters' +
                '<input type="text" name="min_letter" value="">' +
                '<span class="rplg-quest rplg-quest-top22 rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help">' +
                    'It shows reviews with this or more characters length, for instance: if you type 1 it will hide empty reviews' +
                '</div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Maximum characters before \'read more\' link' +
                '<input type="text" name="text_size" value="">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="hide_avatar" value="">' +
                    'Hide user avatars' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="hide_name" value="">' +
                    'Hide user names' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="disable_review_time" value="">' +
                    'Hide review time' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="disable_user_link" value="">' +
                    'Disable user profile links' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="short_last_name" value="">' +
                    'Short last name (GDPR)' +
                '</label>' +
            '</div>' +
        '</div>' +

        '<div class="rplg-builder-top rplg-toggle">Badge Options</div>' +
        '<div class="rplg-builder-inside" style="display:none">' +
            '<div class="rplg-builder-option">' +
                'Click on the badge' +
                '<select name="badge_click">' +
                    '<option value="sidebar" selected="selected">Open reviews sidebar</option>' +
                    '<option value="writereview">Open write a review popup</option>' +
                    '<option value="reviews">Go to all reviews</option>' +
                    '<option value="disable">Disable</option>' +
                '</select>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Space between badges' +
                '<input type="text" name="badge_space_between" value="" placeholder="20px">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="badge_display_block" value="">' +
                    'Render in full width' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="badge_center" value="">' +
                    'Place by center' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="badge_close" value="">' +
                    'Add close button to float badges' +
                '</label>' +
                '<span class="rplg-quest rplg-quest-top rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help" style="display:none;">Adds the close button to the float badges, after closing the float badges are not visible while user do not close the current browser tab. <img src="' + BRB_VARS.BRB_ASSETS_URL +'img/badge_close.png"></div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="hide_float_badge">' +
                    'Hide float badge on mobile' +
                '</label>' +
            '</div>' +
        '</div>' +

        '<div class="rplg-builder-top rplg-toggle">Slider Options</div>' +
        '<div class="rplg-builder-inside" style="display:none">' +
            '<div class="rplg-builder-option">' +
                'Slider effect' +
                '<select name="slider_effect">' +
                    '<option value="slide" selected="selected">Slide</option>' +
                    '<option value="fade">Fade</option>' +
                '</select>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Speed in second' +
                '<input type="text" name="slider_speed" value="" placeholder="for instance: 5">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Number of slides per view' +
                '<input type="text" name="slider_count" value="" placeholder="for instance: 3">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Space between slides' +
                '<input type="text" name="slider_space_between" value="" placeholder="for instance: 40">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Review height' +
                '<input type="text" name="slider_review_height" value="" placeholder="by default: 150px">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="slider_hide_pagin" value="">' +
                    'Hide pagination dots' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="slider_hide_nextprev" value="">' +
                    'Hide Next & Prev arrows' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Desktop mode: window width' +
                '<input type="text" name="slider_desktop_breakpoint" value="" placeholder="1024">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Desktop mode: slides per view' +
                '<input type="text" name="slider_desktop_count" value="" placeholder="3">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Tablet mode: window width' +
                '<input type="text" name="slider_tablet_breakpoint" value="" placeholder="800">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Tablet mode: slides per view' +
                '<input type="text" name="slider_tablet_count" value="" placeholder="8">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Mobile mode: window width' +
                '<input type="text" name="slider_mobile_breakpoint" value="" placeholder="500">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Mobile mode: slides per view' +
                '<input type="text" name="slider_mobile_count" value="" placeholder="1">' +
            '</div>' +
        '</div>' +

        '<div class="rplg-builder-top rplg-toggle">Rich Snippets</div>' +
        '<div class="rplg-builder-inside" style="display:none">' +
            '<div class="rplg-builder-option">' +
                'Add schema AggregateRating markup for' +
                '<select id="schema_rating" name="schema_rating">' +
                    '<option value="">Disable</option>' +
                    '<option value="summary">Summary rating</option>' +
                '</select>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Address:' +
                '<input type="text" name="schema_address_street"   value="" placeholder="Street Address">' +
                '<input type="text" name="schema_address_locality" value="" placeholder="Locality">' +
                '<input type="text" name="schema_address_region"   value="" placeholder="Region">' +
                '<input type="text" name="schema_address_zip"      value="" placeholder="Postal Code">' +
                '<input type="text" name="schema_address_country"  value="" placeholder="Country">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Price Range' +
                '<input type="text" name="schema_price_range" value="" placeholder="">' +
                '<span class="rplg-quest rplg-quest-top22 rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help" style="display: none;">' +
                    '<b>$</b> = Inexpensive, usually $10 and under<br>' +
                    '<b>$$</b> = Moderately expensive, usually between $10-$25<br>' +
                    '<b>$$$</b> = Expensive, usually between $25-$45<br>' +
                    '<b>$$$$</b> = Very Expensive, usually $50 and up<br>' +
                '</div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Telephone' +
                '<input type="text" name="schema_phone" value="" placeholder="">' +
            '</div>' +
            '<div class="rplg-builder-option rplg-well">' +
                '<b>Warnings and limitations:</b>' +
                '<p><b>1.</b> Google does not guarantee that your structured data will show up in search results even if structured data is marked up and can be extracted successfully according to the testing tool. <a href="https://developers.google.com/search/docs/guides/mark-up-content#how_does_it_work" target="_blank">Link to Google source</a>.</p>' +
                '<p><b>2.</b> If you select \'Summary rating\', please make sure that the option \'Show summary rating\' is enabled in the \'Header Options\' panel.</p>' +
                '<p><b>3.</b> Rich Snippets will not be added without at least one business header (if only reviews are shown) and following mandatory fields: image, name, reviews count.</p>' +
                '<p><b>4.</b> Google does not index Rich Snippets on homepage, it is a limitation of Google, not specifically the plugin.</p>' +
                '<p><b>5.</b> Do not place a widget or shortcode with enable Rich Snippets option on the each page of the site because in this case Google might consider a schema markup as duplicate content. Just select a single page (except a homepage) and place such shortcode there.</p>' +
                'Test the page in <a href="https://search.google.com/structured-data/testing-tool" target="_blank">Google Structured Data Testing Tool</a> before published.' +
            '</div>' +
        '</div>' +

        '<div class="rplg-builder-top rplg-toggle">Style Options</div>' +
        '<div class="rplg-builder-inside" style="display:none">' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="dark_theme">' +
                    'Dark background' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="centred">' +
                    'Place by center (only if <b>Maximum width</b> specified)' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Maximum width' +
                '<input type="text" name="max_width" value="" placeholder="for instance: 300px">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Maximum height' +
                '<input type="text" name="max_height" value="" placeholder="for instance: 500px">' +
            '</div>' +
        '</div>' +

        '<div class="rplg-builder-top rplg-toggle">Advance Options</div>' +
        '<div class="rplg-builder-inside" style="display:none">' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="open_link" checked>' +
                    'Open links in new Window' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="nofollow_link" checked>' +
                    'Use no follow links' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="lazy_load_img" checked>' +
                    'Lazy load images' +
                '</label>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="google_success_api" checked>' +
                    'Remember last Google API success response' +
                '</label>' +
                '<span class="rplg-quest rplg-quest-top rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help" style="display:none;">The plugin uses the Google MY Business API to show the reviews, but sometime, this API returns some errors, for instance when connected Google account loses the manage right and the plugin shows the ungly red error about it. This option stops show such errors and displaying the reviews from the last success response from the Google API.</div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="google_def_rev_link">' +
                    'Use default Google reviews link' +
                '</label>' +
                '<span class="rplg-quest rplg-quest-top rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help" style="display:none;">If the direct link to all reviews <b>https://search.google.com/local/reviews?placeid=&lt;PLACE_ID&gt;</b> does not work with your Google place (leads to 404), please use this option to use the default reviews link to Google map.</div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="fb_success_api" checked>' +
                    'Remember last Faceboook API success response' +
                '</label>' +
                '<span class="rplg-quest rplg-quest-top rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help" style="display:none;">The plugin uses the Facebook Graph API to show the reviews, but sometime, this API returns some errors, for instance when connected FB account loses the admin right and the plugin shows the ungly red error about it. This option stops show such errors and displaying the reviews from the last success response from the FB API.</div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="fb_rating_calc" checked>' +
                    'Calculate FB rating based on current reviews' +
                '</label>' +
                '<span class="rplg-quest rplg-quest-top rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help" style="display:none;">The plugin gets a FB page rating from the FB Graph API, but sometime, this rating becomes outdated. This option calculates the rating manually based on current reviews/recommendations and keeps it up to date.</div>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Reviewer avatar size' +
                '<select name="reviewer_avatar_size">' +
                    '<option value="56" selected="selected">Small: 56px</option>' +
                    '<option value="128">Medium: 128px</option>' +
                    '<option value="256">Large: 256px</option>' +
                '</select>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Cache data' +
                '<select name="cache">' +
                    '<option value="1">1 Hour</option>' +
                    '<option value="3">3 Hours</option>' +
                    '<option value="6">6 Hours</option>' +
                    '<option value="12" selected="selected">12 Hours</option>' +
                    '<option value="24">1 Day</option>' +
                    '<option value="48">2 Days</option>' +
                    '<option value="168">1 Week</option>' +
                    '<option value="">Disable (NOT recommended)</option>' +
                '</select>' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Google My Business API limit' +
                '<input type="text" name="google_api_limit" value="" placeholder="by default 5000">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Facebook Ratings API limit' +
                '<input type="text" name="fb_api_limit" value="" placeholder="by default 5000">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                'Reviews limit' +
                '<input type="text" name="reviews_limit" value="">' +
            '</div>' +
        '</div>' +
    '</div>' +
    '';

function rplg_builder_init(data) {

    var el = document.querySelector(data.el);
    if (!el) return;

    if (data.use_gpa) {
        HTML_CONTENT = HTML_CONTENT.replace('{google_connect}', '<div class="rplg-toggle rplg-builder-connect rplg-connect-google">Connect Google</div>');
    } else {
        HTML_CONTENT = HTML_CONTENT.replace('{google_connect}', '<button class="rplg-builder-connect rplg-connect-google">Connect Google</button>');
    }

    el.innerHTML = HTML_CONTENT;

    if (data.conns) {
        rplg_deserialize_connections(el, data.conns, data.opts);
    }

    // Google Connect
    var platform_google_el = el.querySelector('.rplg-platform-google');

    // Facebook Connect
    var platform_facebook_el = el.querySelector('.rplg-platform-facebook');

    // Yelp Connect
    var platform_yelp_el = el.querySelector('.rplg-platform-yelp');
    rplg_connection(platform_yelp_el, 'yelp');

    if (data.use_gpa) {
        rplg_connection(platform_google_el, 'google');
    } else {
        WPacFastjs.on2(el, '.rplg-connect-google', 'click', function(e) {
            var button = this;

            button.disabled = true;
            button.innerText = 'Connection.';
            var spinner = setInterval(function() {
                var text = button.innerText,
                    dot = text.indexOf('.');
                if (dot > -1 && text.substr(dot, text.length).length < 4) {
                    button.innerText += '.';
                } else {
                    button.innerText = 'Connection.';
                }
            }, 500);

            var temp_code = rplg_randstr(16);

            rplg_popup('https://app.richplugins.com/auth/google?auth_code=' + data.auth_code + '&temp_code=' + temp_code, 670, 520, function() {
                WPacFastjs.jsonp('https://app.richplugins.com/gmb/accounts', {
                    auth_code : data.auth_code,
                    temp_code : temp_code,
                    limit     : 300
                }, function(res) {
                    console.log(res);
                    rplg_add_google_locations(platform_google_el, res, data.auth_code, function() {
                        clearInterval(spinner);
                        button.innerText = 'Connect Google';
                        button.disabled = false;
                    });
                });
            });

            return false;
        });
    }

    WPacFastjs.on2(el, '.rplg-connect-facebook', 'click', function() {
        var button = this;

        button.disabled = true;
        button.innerText = 'Connection.';
        var spinner = setInterval(function() {
            var text = button.innerText,
                dot = text.indexOf('.');
            if (dot > -1 && text.substr(dot, text.length).length < 4) {
                button.innerText += '.';
            } else {
                button.innerText = 'Connection.';
            }
        }, 500);

        var temp_code = rplg_randstr(16);
        rplg_popup('https://app.widgetpack.com/auth/fbrev?scope=manage_pages,pages_show_list&state=' + temp_code, 670, 520, function() {
            WPacXDM.get('https://embed.widgetpack.com', 'https://app.widgetpack.com/widget/facebook/accesstoken?temp_code=' + temp_code, {}, function(res) {
                WPacFastjs.jsonp('https://graph.facebook.com/me/accounts', {access_token: res.accessToken, limit: 250}, function(res) {

                    var is_show_checkbox = res.data.length > 1;
                    if (is_show_checkbox) {
                        WPacFastjs.addcl(platform_facebook_el, 'rplg-platform-multiple');
                    }

                    WPacFastjs.each(res.data, function(page) {
                        rplg_connection_add(platform_facebook_el, {
                            id       : page.id,
                            name     : page.name,
                            photo    : 'https://graph.facebook.com/' + page.id +  '/picture',
                            platform : 'facebook',
                            props    : {
                                access_token  : page.access_token,
                                default_photo : 'https://graph.facebook.com/' + page.id +  '/picture',
                            }
                        });
                        rplg_serialize_connections();
                    });

                    clearInterval(spinner);
                    button.innerText = 'Connect Facebook';
                    button.disabled = false;

                });
            });
        });
        return false;
    });

    WPacFastjs.onall2(el, '.rplg-connection-checkbox input', 'change', function() {
        var target = this,
            platform = WPacFastjs.parents(this, 'rplg-builder-platform'),
            checkboxs = platform.querySelectorAll('.rplg-connect-select');
        WPacFastjs.each(checkboxs, function(checkbox) {
            checkbox.checked = target.checked;
        });
        rplg_serialize_connections();
    });

    jQuery(document).ready(function($) {
        $('.rplg-connect-options input[type="text"],.rplg-connect-options textarea').keyup(function() {
            rplg_serialize_connections();
        });
        $('.rplg-connect-options input[type="checkbox"],.rplg-connect-options select').change(function() {
            rplg_serialize_connections();
        });

        $('.rplg-toggle', el).unbind('click').click(function () {
            $(this).toggleClass('toggled');
            $(this).next().slideToggle();
        });

        if ($('.rplg-connections').sortable) {
            $('.rplg-connections').sortable({
                stop: function(event, ui) {
                    rplg_serialize_connections();
                }
            });
            $('.rplg-connections').disableSelection();
        }
    });
}

function rplg_add_google_locations(el, accountsRes, auth_code, cb) {

    var account = accountsRes.accounts.shift();

    WPacFastjs.jsonp('https://app.richplugins.com/gmb/' + account.name + '/locations', {
        auth_code  : auth_code,
        account_id : accountsRes.root_account,
        limit      : 500
    }, function(res) {

        console.log(res);

        var locations = res.locations;
        if (locations && locations.length) {

            var is_show_checkbox = locations.length > 1 || el.querySelectorAll('.rplg-connection').length > 1;
            if (is_show_checkbox) {
                WPacFastjs.addcl(el, 'rplg-platform-multiple');
            }

            WPacFastjs.each(locations, function(location) {
                var profilePhotoUrl = account.profilePhotoUrl;
                if (profilePhotoUrl && profilePhotoUrl.indexOf('//') == 0) {
                    profilePhotoUrl = 'https:' + profilePhotoUrl;
                }
                rplg_connection_add(el, {
                    id       : location.name,
                    name     : location.locationName,
                    website  : location.websiteUrl,
                    photo    : profilePhotoUrl,
                    address  : location.address ? location.address.locality : '',
                    platform : 'google',
                    props    : {
                        root_account  : accountsRes.root_account,
                        place_id      : location.locationKey.placeId,
                        default_photo : profilePhotoUrl
                    }
                });
                rplg_serialize_connections();
            });
        }

        if (accountsRes.accounts.length > 0) {
            return setTimeout(function() {
                rplg_add_google_locations(el, accountsRes, auth_code, cb);
            }, 50);
        } else {
            return cb();
        }
    });
}

function rplg_connection(el, platform) {
    var connect_btn = el.querySelector('.rplg-connect-btn');
    WPacFastjs.on(connect_btn, 'click', function() {

        var connect_id_el = el.querySelector('.rplg-connect-id'),
            id = (platform == 'yelp' ? /.+\/biz\/(.*?)(\?|\/|$)/.exec(connect_id_el.value)[1] : connect_id_el.value),

            lang = el.querySelector('.rplg-connect-lang').value,

            connect_key_el = el.querySelector('.rplg-connect-key'),
            key = connect_key_el.value;

        if (!id) {
            connect_id_el.focus();
            return false;
        } else if (!key) {
            connect_key_el.focus();
            return false;
        }

        connect_btn.innerHTML = 'Please wait...';
        connect_btn.disabled = true;

        var url = BRB_VARS.handlerUrl + '&cf_action=brb_connect_' + platform + '&v=' + new Date().getTime();
        jQuery.post(url, {
            id: decodeURIComponent(id),
            lang: lang,
            key: key,
            brb_wpnonce: jQuery('#brb_nonce').val()
        }, function(res) {

            console.log('rplg_connect_debug:', res);

            connect_btn.innerHTML = 'Connect ' + (platform.charAt(0).toUpperCase() + platform.slice(1));
            connect_btn.disabled = false;

            var error_el = el.querySelector('.rplg-connect-error');

            if (res.status == 'success') {

                error_el.innerHTML = '';

                var connection_params = {
                    id       : res.result.id,
                    lang     : lang,
                    name     : res.result.name,
                    photo    : res.result.photo,
                    refresh  : true,
                    platform : platform,
                    props    : {
                        default_photo : res.result.photo
                    }
                };

                /*if (platform == 'google') {
                    connection_params.review_count = '';
                }*/

                rplg_connection_add(el, connection_params);
                rplg_serialize_connections();

            } else {

                error_el.innerHTML = '<b>Error</b>: ' + res.result.error_message;
                if (res.result.status == 'OVER_QUERY_LIMIT') {
                    error_el.innerHTML += '<br><br>More recently, Google has limited the API to 1 request per day for new users, try to create new <a href="https://developers.google.com/places/web-service/get-api-key#get_an_api_key" target="_blank">Google API key</a>, save in the setting and Connect Google again.';
                }

            }

        }, 'json');
        return false;
    });
}

function rplg_connection_add(el, conn, checked) {

    var connected_id = 'rplg-' + conn.platform + '-' + conn.id.replace(/\//g, '');
    if (conn.lang != null) {
        connected_id += conn.lang;
    }

    var connected_el = el.querySelector('#' + connected_id);

    if (!connected_el) {
        connected_el = WPacFastjs.create('div', 'rplg-connection');
        connected_el.id = connected_id;
        if (conn.lang != undefined) {
            connected_el.setAttribute('data-lang', conn.lang);
        }
        connected_el.setAttribute('data-platform', conn.platform);
        connected_el.innerHTML = rplg_connection_render(conn, checked);

        var connections_el = el.querySelector('.rplg-connections');
        connections_el.appendChild(connected_el);

        jQuery('.rplg-toggle', connected_el).unbind('click').click(function () {
            jQuery(this).toggleClass('toggled');
            jQuery(this).next().slideToggle();
        });

        var file_frame;
        jQuery('.rplg-connect-photo-change', connected_el).on('click', function(e) {
            e.preventDefault();
            rplg_upload_photo(connected_el, file_frame, function() {
                rplg_serialize_connections();
            });
            return false;
        });

        jQuery('.rplg-connect-photo-default', connected_el).on('click', function(e) {
            rplg_change_photo(connected_el, conn.props.default_photo);
            rplg_serialize_connections();
            return false;
        });

        WPacFastjs.onall2(connected_el, 'input[type="text"]', 'keyup', function() {
            rplg_serialize_connections();
        });

        WPacFastjs.onall2(connected_el, 'input[type="checkbox"]', 'click', function() {
            rplg_serialize_connections();
        });

        WPacFastjs.on2(connected_el, '.rplg-connect-delete', 'click', function() {
            if (confirm('Are you sure to delete this business?')) {
                if (!BRB_VARS.wordpress) {
                    var id = connected_el.querySelector('input[name="id"]').value,
                        deleted = window.connections_delete.value;
                    window.connections_delete.value += (deleted ? ',' + id : id);
                }
                WPacFastjs.rm(connected_el);
                rplg_serialize_connections();
            }
            return false;
        });
    }
}

function rplg_connection_render(conn, checked) {
    var name = conn.name;
    if (conn.lang) {
        name += ' (' + conn.lang + ')';
    }

    conn.photo = conn.photo || 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';

    var option = document.createElement('option');
    if (conn.platform == 'google' && conn.props && conn.props.place_id) {
        option.value = conn.props.place_id;
    } else {
        option.value = conn.id;
    }
    option.text = conn.platform.capitalize() + ': ' + conn.name;
    window.schema_rating.add(option);

    return '' +
        '<div class="rplg-toggle rplg-builder-connect rplg-connect-business">' +
            '<input type="checkbox" class="rplg-connect-select" onclick="event.stopPropagation();" ' + (checked?'checked':'') + ' /> ' +
            name + (conn.address ? ' (' + conn.address + ')' : '') +
        '</div>' +
        '<div style="display:none">' +
            (function(props) {
                var result = '';
                for (prop in props) {
                    if (prop != 'platform' && Object.prototype.hasOwnProperty.call(props, prop)) {
                        result += '<input type="hidden" name="' + prop + '" value="' + props[prop] + '" class="rplg-connect-prop" readonly />';
                    }
                }
                return result;
            })(conn.props) +
            '<input type="hidden" name="id" value="' + conn.id + '" readonly />' +
            (conn.address ? '<input type="hidden" name="address" value="' + conn.address + '" readonly />' : '') +
            (conn.access_token ? '<input type="hidden" name="access_token" value="' + conn.access_token + '" readonly />' : '') +
            '<div class="rplg-builder-option">' +
                '<img src="' + conn.photo + '" alt="' + conn.name + '" class="rplg-connect-photo">' +
                '<a href="#" class="rplg-connect-photo-change">Change</a>' +
                '<a href="#" class="rplg-connect-photo-default">Default</a>' +
                '<input type="hidden" name="photo" class="rplg-connect-photo-hidden" value="' + conn.photo + '" tabindex="2"/>' +
                '<input type="file" tabindex="-1" accept="image/*" onchange="rplg_upload_image(this.parentNode, this.files)" style="display:none!important">' +
            '</div>' +
            '<div class="rplg-builder-option">' +
                '<input type="text" name="name" value="' + conn.name + '" />' +
            '</div>' +
            (conn.website != undefined ?
            '<div class="rplg-builder-option">' +
                '<input type="text" name="website" value="' + conn.website + '" />' +
            '</div>'
            : '' ) +
            (conn.lang != undefined ?
            '<div class="rplg-builder-option">' +
                '<input type="text" name="lang" value="' + conn.lang + '" placeholder="Any language" readonly />' +
            '</div>'
            : '' ) +
            (conn.review_count != undefined ?
            '<div class="rplg-builder-option">' +
                '<input type="text" name="review_count" value="' + conn.review_count + '" placeholder="Total number of reviews" />' +
                '<span class="rplg-quest rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help">Google return only 5 most helpful reviews and does not return information about total number of reviews and you can type here it manually.</div>' +
            '</div>'
            : '' ) +
            (conn.refresh != undefined ?
            '<div class="rplg-builder-option">' +
                '<label>' +
                    '<input type="checkbox" name="refresh" ' + (conn.refresh ? 'checked' : '') + '> Refresh reviews' +
                '</label>' +
                '<span class="rplg-quest rplg-quest-top rplg-toggle" title="Click to help">?</span>' +
                '<div class="rplg-quest-help">' +
                    (conn.platform == 'google' ? 'The plugin uses the Google Places API to get your reviews. <b>The API only returns the 5 most helpful reviews without sorting possibility and without information about the total number of reviews.</b> When Google changes the 5 most helpful the plugin will automatically add the new one to your database. Thus slowly building up a database of reviews.' : '') +
                    (conn.platform == 'yelp' ? 'The plugin uses the Yelp API to get your reviews. <b>The API only returns the 3 most helpful reviews without sorting possibility.</b> When Yelp changes the 3 most helpful the plugin will automatically add the new one to your database. Thus slowly building up a database of reviews.' : '') +
                '</div>' +
            '</div>'
            : '' ) +
            '<div class="rplg-builder-option">' +
                '<button class="rplg-connect-delete">Delete business</button>' +
            '</div>' +
        '</div>';
}

function rplg_serialize_connections() {

    var connections = [],
        connections_el = document.querySelectorAll('.rplg-connection');

    for (var i in connections_el) {
        if (Object.prototype.hasOwnProperty.call(connections_el, i)) {

            var select_el = connections_el[i].querySelector('.rplg-connect-select');
            if (select_el && !rplg_is_hidden(select_el) && !select_el.checked) {
                continue;
            }

            var connection = {},
                lang       = connections_el[i].getAttribute('data-lang'),
                platform   = connections_el[i].getAttribute('data-platform'),
                inputs     = connections_el[i].querySelectorAll('input');

            //connections[platform] = connections[platform] || [];

            if (lang != undefined) {
                connection.lang = lang;
            }

            for (var j in inputs) {
                if (Object.prototype.hasOwnProperty.call(inputs, j)) {
                    var input = inputs[j],
                        name = input.getAttribute('name');

                    if (!name) continue;

                    if (input.className == 'rplg-connect-prop') {
                        connection.props = connection.props || {};
                        connection.props[name] = input.value;
                    } else {
                        connection[name] = (input.type == 'checkbox' ? input.checked : input.value);
                    }
                }
            }
            connection.platform = platform;
            connections.push(connection);
        }
    }

    var options = {},
        options_el = document.querySelector('.rplg-connect-options').querySelectorAll('input[name],select,textarea');

    for (var o in options_el) {
        if (Object.prototype.hasOwnProperty.call(options_el, o)) {
            var input = options_el[o],
                name  = input.getAttribute('name');

            if (input.type == 'checkbox') {
                options[name] = input.checked;
            } else if (input.value != undefined) {
                options[name] = (input.type == 'textarea' ? escape(input.value) : input.value);
            }
        }
    }

    if (BRB_VARS.wordpress) {
        document.getElementById('brb-builder-connection').value = JSON.stringify({connections: connections, options: options});
    } else {
        document.getElementById('brb-builder-connections').value = JSON.stringify(connections);
        document.getElementById('brb-builder-options').value = JSON.stringify(options);
    }
}

function rplg_deserialize_connections(el, connections, options) {
    if (BRB_VARS.wordpress) {
        options = connections.options;
        if (Array.isArray(connections.connections)) {
            connections = connections.connections;
        } else {
            var temp_conns = [];
            if (Array.isArray(connections.google)) {
                for (var c = 0; c < connections.google.length; c++) {
                    connections.google[c].platform = 'google';
                }
                temp_conns = temp_conns.concat(connections.google);
            }
            if (Array.isArray(connections.facebook)) {
                for (var c = 0; c < connections.facebook.length; c++) {
                    connections.facebook[c].platform = 'facebook';
                }
                temp_conns = temp_conns.concat(connections.facebook);
            }
            if (Array.isArray(connections.yelp)) {
                for (var c = 0; c < connections.yelp.length; c++) {
                    connections.yelp[c].platform = 'yelp';
                }
                temp_conns = temp_conns.concat(connections.yelp);
            }
            connections = temp_conns;
        }
    } else {
        connections = JSON.parse(connections);
        options = JSON.parse(options);
    }

    for (var i = 0; i < connections.length; i++) {
        rplg_connection_add(el.querySelector('.rplg-platform-' + connections[i].platform), connections[i], true);
    }

    for (var opt in options) {
        if (Object.prototype.hasOwnProperty.call(options, opt)) {
            var control = el.querySelector('input[name="' + opt + '"],select[name="' + opt + '"],textarea[name="' + opt + '"]');
            if (control) {
                if (typeof(options[opt]) === 'boolean') {
                    control.checked = options[opt];
                } else {
                    control.value = (control.type == 'textarea' ? unescape(options[opt]) : options[opt]);
                    if (opt.indexOf('_photo') > -1 && control.value) {
                        control.parentNode.querySelector('img').src = control.value;
                    }
                }
            }
        }
    }
}

function rplg_upload_photo(el, file_frame, cb) {
    if (BRB_VARS.wordpress) {
        if (file_frame) {
            file_frame.open();
            return;
        }

        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery(this).data('uploader_title'),
            button: {text: jQuery(this).data('uploader_button_text')},
            multiple: false
        });

        file_frame.on('select', function() {
            var attachment = file_frame.state().get('selection').first().toJSON();
            rplg_change_photo(el, attachment.url);
            cb && cb(attachment.url);
        });
        file_frame.open();
    } else {
        el.querySelector('input[type="file"]').click();
        return false;
    }
}

function rplg_upload_image(el, files) {
    var formData = new FormData();
    for (var i = 0, file; file = files[i]; ++i) {
        formData.append('file', file);
    }

    var handler = this;

    if (!this.xhr) {
        this.xhr = new XMLHttpRequest();
    }
    this.xhr.open('POST', 'https://media.cackle.me/upload2', true);
    this.xhr.onload = function(e) {
        if (4 === handler.xhr.readyState) {
            if (200 === handler.xhr.status && handler.xhr.responseText.length > 0) {
                var img = 'https://media.cackle.me/' + handler.xhr.responseText;
                rplg_change_photo(el, img);
            }
        }
    };
    this.xhr.send(formData);
}

function rplg_change_photo(el, photo_url) {
    var place_photo_hidden = jQuery('.rplg-connect-photo-hidden', el),
        place_photo_img = jQuery('.rplg-connect-photo', el);

    place_photo_hidden.val(photo_url);
    place_photo_img.attr('src', photo_url);
    place_photo_img.show();

    rplg_serialize_connections();
}

function rplg_popup(url, width, height, cb) {
    var top = top || (screen.height/2)-(height/2),
        left = left || (screen.width/2)-(width/2),
        win = window.open(url, '', 'location=1,status=1,resizable=yes,width='+width+',height='+height+',top='+top+',left='+left);
    function check() {
        if (!win || win.closed != false) {
            cb();
        } else {
            setTimeout(check, 100);
        }
    }
    setTimeout(check, 100);
}

function rplg_randstr(len) {
   var result = '',
       chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',
       charsLen = chars.length;
   for ( var i = 0; i < len; i++ ) {
      result += chars.charAt(Math.floor(Math.random() * charsLen));
   }
   return result;
}

function rplg_is_hidden(el) {
    return el.offsetParent === null;
}