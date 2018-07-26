<?php

use Illuminate\Database\Seeder;

class BusinessOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('business_options')->delete();
        
        \DB::table('business_options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'level_id' => 1,
                'section_id' => 1,
                'parent_id' => NULL,
                'name' => 'What industry is your business idea in?',
                'short_name' => 'Industry',
                'slug' => 'what-industry-is-your-business-idea-in',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>Select the best fit below. Don\'t worry you can always change your selection later.</p>
<p>[BusinessCategories]</p>',
                'element' => 'BusinessCategories',
                'element_data' => '{"meta_key":null}',
                'tooltip_title' => NULL,
                'tooltip' => NULL,
                'menu_order' => 1,
                'weight' => 1,
                'template' => 'default',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-07-26 09:30:07',
            ),
            1 => 
            array (
                'id' => 2,
                'level_id' => 1,
                'section_id' => 1,
                'parent_id' => NULL,
                'name' => 'Will you also be selling goods online?',
                'short_name' => 'Sell Goods Online',
                'slug' => 'will-you-also-be-selling-goods-online',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[SellGoods]</p>',
                'element' => 'SellGoods',
                'element_data' => '{"meta_key":null}',
                'tooltip_title' => NULL,
                'tooltip' => NULL,
                'menu_order' => 2,
                'weight' => 1,
                'template' => 'default',
                'show_everywhere' => 0,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:28:38',
                'updated_at' => '2018-07-26 09:30:17',
            ),
            2 => 
            array (
                'id' => 3,
                'level_id' => 1,
                'section_id' => 2,
                'parent_id' => NULL,
                'name' => 'Great Now lets create your account',
                'short_name' => 'Create Your Account',
                'slug' => 'great-now-lets-create-your-account',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[RegisterUser]</p>',
                'element' => 'RegisterUser',
                'element_data' => '{"meta_key":null}',
                'tooltip_title' => NULL,
                'tooltip' => NULL,
                'menu_order' => 3,
                'weight' => 1,
                'template' => 'default',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:13:17',
                'updated_at' => '2018-07-26 09:30:28',
            ),
            3 => 
            array (
                'id' => 4,
                'level_id' => 1,
                'section_id' => 3,
                'parent_id' => NULL,
                'name' => 'So tell us about your business',
                'short_name' => 'About Your Business',
                'slug' => 'so-tell-us-about-your-business',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[CreateBusiness]</p>',
                'element' => 'CreateBusiness',
                'element_data' => '{"meta_key":null}',
                'tooltip_title' => NULL,
                'tooltip' => '<h5>Business Website</h5>
<p><span style="font-weight: 400;">Your business website is a fundamental component of your online presence (and can even extend as your online store). As an extension of your brand identity, it needs to be consistent in conveying your brand message. Here are a few things to consider for your website:</span></p>
<ul>
<li><strong>Clean, simple elements</strong><span style="font-weight: 400;">: Like your logo, a simple website layout works well, especially with the prominent placement of your visual identity elements (logo, colours, tagline)</span></li>
<li><strong>Optimized content</strong><span style="font-weight: 400;">: Make sure to include the basic company information and company news; later on, add prime content such as industry reports and analyses that reinforce your industry expertise</span></li>
<li><strong>Good SEO strategy</strong><span style="font-weight: 400;">: Improve your website SEO strategy by creating fresh content for your website to enjoy good consistent search rankings</span></li>
</ul>
<p>&nbsp;</p>
<h5>Business Name</h5>
<p><span style="font-weight: 400;">Your business name represents your brand and promotes the value and unique proposition of your product and service.</span></p>
<p><span style="font-weight: 400;">Ideally, it consists of two parts: a name and a tagline &ndash; both working together to create a good first impression for customers. For example, Bob&rsquo;s Construction - </span><em><span style="font-weight: 400;">Built on time, on budget and with a smile.</span></em></p>
<p><span style="font-weight: 400;">Small businesses need a strong brand name to set themselves apart from competitors. Any name, whether it is abstract or informative, can be effective if backed by an appropriate marketing strategy. A few tips:</span></p>
<ul>
<li><span style="font-weight: 400;"> &nbsp;Your name is simple, unique and conveys your brand personality</span></li>
<li><span style="font-weight: 400;"> &nbsp;It has an available domain name for your web presence and online business</span></li>
<li><span style="font-weight: 400;"> &nbsp;Your name is not confusing (not misunderstood)</span></li>
</ul>',
                'menu_order' => 4,
                'weight' => 1,
                'template' => 'default',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:14:09',
                'updated_at' => '2018-07-26 09:30:38',
            ),
            4 => 
            array (
                'id' => 5,
                'level_id' => 1,
                'section_id' => 4,
                'parent_id' => NULL,
                'name' => 'Register Your Business',
                'short_name' => 'Register Your Business',
                'slug' => 'register-your-business',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[RegisterBusiness]</p>',
                'element' => 'RegisterBusiness',
                'element_data' => '{"meta_key":null}',
                'tooltip_title' => NULL,
                'tooltip' => NULL,
                'menu_order' => 5,
                'weight' => 1,
                'template' => 'default',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:15:17',
                'updated_at' => '2018-07-26 09:30:52',
            ),
            5 => 
            array (
                'id' => 6,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Do you have a logo?',
                'short_name' => 'Logo',
                'slug' => 'do-you-have-a-logo',
                'icon' => 'logo.png',
                'hover_icon' => 'logo.png',
                'content' => '<p>Do you have a logo?</p>
<p>[SingleImageField]</p>',
                'element' => 'SingleImageField',
                'element_data' => NULL,
                'tooltip_title' => 'Logo',
                'tooltip' => '<p><span style="font-weight: 400;">A logo is a symbol of your business identity and brand. As a visual representation of what your small business stands for, a logo identifies your company and product. In tandem with a good logo, a corporate tagline defines your mission statement in a few words or a powerful catchphrase. Both reinforce your brand message. What makes for a good logo and a catchy tagline?</span></p>
<ul>
<li><strong>Memorable</strong><span style="font-weight: 400;">: A simple logo and a catchy tagline that easily grabs people&rsquo;s attention and leaves a good lasting impression</span></li>
<li><strong>Has clear benefit</strong><span style="font-weight: 400;">: A logo and tagline serve as mini-mission statements of the company&rsquo;s overall brand objective</span></li>
<li><strong>Elicits positive feelings</strong><span style="font-weight: 400;">: Both should promote positive emotions and values that the consumer can identify with your product or service</span></li>
</ul>
<p>&nbsp;</p>',
                'menu_order' => 6,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:34:28',
                'updated_at' => '2018-07-26 09:31:05',
            ),
            6 => 
            array (
                'id' => 7,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Enter your tagline or create one now',
                'short_name' => 'Tagline',
                'slug' => 'enter-your-tagline-or-create-one-now',
                'icon' => 'tagline.png',
                'hover_icon' => 'tagline.png',
                'content' => '<p>Enter your tagline or create one now</p>
<p>[SingleTextField]</p>',
                'element' => 'SingleTextField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>Small businesses need a strong brand name to set themselves apart from competitors. Any name, whether it is abstract or informative, can be effective if backed by an appropriate marketing strategy. A few tips: &middot;</p>
<ul>
<li>Your name is simple, unique and conveys your brand personality.</li>
<li>It has an available domain name for your web presence and online business.</li>
<li>Your name is not confusing (not misunderstood).</li>
</ul>
<p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap;">&nbsp;</span></p>',
                'menu_order' => 7,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:34:28',
                'updated_at' => '2018-07-26 09:31:21',
            ),
            7 => 
            array (
                'id' => 8,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Select Your Brand Colour',
                'short_name' => 'Brand Color',
                'slug' => 'select-your-brand-color',
                'icon' => 'brandcolor.png',
                'hover_icon' => 'brandcolor.png',
                'content' => '<p>Select Your Brand Colour</p>
<p>[BrandColor]</p>',
                'element' => 'BrandColor',
                'element_data' => NULL,
                'tooltip_title' => 'Brand Colour',
                'tooltip' => '<p><span style="font-weight: 400;">Understanding the psychology on how to use colour in terms of connecting to your customers can increase the effectiveness and success of your branding efforts.</span></p>
<p><span style="font-weight: 400;">Your business colour helps set up the overall theme and personality of your business brand. Different colours have different emotional connotations to people. And this is where you can reinforce the meaning of your brand and its affinity with your customers.</span></p>
<p><span style="font-weight: 400;">For example, your target clients are upper middle-class women, which dictates that your market is that of prestige and exclusivity and the personality you want to adopt is a sophisticated brand. Then, you pick a colour that reflects this. Some basic colour meanings:</span></p>
<ul>
<li><span style="font-weight: 400;"><strong>Red</strong> &ndash; triggers powerful emotion like power, passion and caution</span></li>
<li><span style="font-weight: 400;"><strong>Orange</strong> &ndash; generates a vibe of warmth, confidence and adventure</span></li>
<li><span style="font-weight: 400;"><strong>Yellow</strong> &ndash; indicates youth, happiness and fun</span></li>
<li><span style="font-weight: 400;"><strong>Green</strong> &ndash; conveys growth, health and prosperity</span></li>
<li><span style="font-weight: 400;"><strong>Blue</strong> &ndash; represents calmness, strength and wisdom</span></li>
</ul>',
                'menu_order' => 8,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:36:54',
                'updated_at' => '2018-07-26 09:31:31',
            ),
            8 => 
            array (
                'id' => 9,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Social Media Registration',
                'short_name' => 'Social Media Registration',
                'slug' => 'social-media-registration',
                'icon' => 'socialmedia.png',
                'hover_icon' => 'socialmedia.png',
                'content' => NULL,
                'element' => NULL,
                'element_data' => NULL,
                'tooltip_title' => 'Social Media Registration',
                'tooltip' => '<p><span style="font-weight: 400;">Using social media to boost your marketing and eventually, your sales strategy relies on understanding how to better serve your customers. Social media marketing allows you to reinforce your brand value and proposition while promoting constant connections with your customers.</span></p>
<p><span style="font-weight: 400;">To start your social media marketing journey, it pays to know the following:</span></p>
<ul>
<li><strong>Ready your information for registration</strong><span style="font-weight: 400;">: Have an email for registration and a list of your business name, website or physical location and contact number.</span></li>
<li><strong>Identify channels to use</strong><span style="font-weight: 400;">: Listen to your audience to better identify what social media channels they use.</span></li>
<li><strong>Define your content strategy</strong><span style="font-weight: 400;">: Create a social media handle and hashtag unique to your brand and incorporate SEO keywords.</span></li>
</ul>',
                'menu_order' => 9,
                'weight' => NULL,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:37:43',
                'updated_at' => '2018-06-08 14:47:50',
            ),
            9 => 
            array (
                'id' => 10,
                'level_id' => 2,
                'section_id' => 6,
                'parent_id' => NULL,
                'name' => 'Financing Options?',
                'short_name' => 'Financing Options',
                'slug' => 'financing-option',
                'icon' => 'fW0an6Z5piGcijwDjYL7uFg57YdcVR52.png',
                'hover_icon' => '7COPWZnzum9M2Xh619PyOXAFetyrRfDm.png',
                'content' => '<p>Have you considered different financing options?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Financing Options',
                'tooltip' => '<p><span style="font-weight: 400;">While most small businesses have no standard capital required, drawing a plan on how to secure new capital for growth is vital. List down your options on where to get money to increase your initial capital and meet your budget needs.</span></p>
<ul>
<li><strong>Bootstrapping</strong><span style="font-weight: 400;">: Many successful entrepreneurs launch start-ups with little capital, using their own savings</span></li>
<li><strong>Family and friends</strong><span style="font-weight: 400;">: You can also ask for help for additional capital but be sure to pay them based on the agreed schedule</span></li>
<li><strong>Bank loans</strong><span style="font-weight: 400;">: Ask for short-, mid- or long-term financing but make sure you can cover the interest rates and return the principal amount borrowed</span></li>
<li><strong>Venture capital and angel investors</strong><span style="font-weight: 400;">: This is an option if your business has a good cashflow history and bankable reputation</span></li>
<li><strong>Government loans</strong><span style="font-weight: 400;">: Check their offerings and compare payment rates</span></li>
</ul>',
                'menu_order' => 14,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:40:03',
                'updated_at' => '2018-07-26 09:32:58',
            ),
            10 => 
            array (
                'id' => 11,
                'level_id' => 2,
                'section_id' => 6,
                'parent_id' => NULL,
                'name' => 'Initial accounting software?',
                'short_name' => 'Initial accounting software',
                'slug' => 'initial-account-software',
                'icon' => 'xVG7gdu9o6CO0l2Y1Xbf2enLtArMLKqO.png',
                'hover_icon' => 'wAi4bh7ICXOxilS0BB9znQ1Mr6O7B85Q.png',
                'content' => '<p>Initial accounting software?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Initial accounting software',
                'tooltip' => '<p><span style="font-weight: 400;">Bookkeeping is a much-needed function in managing your finance. Offerings from Xero, Intuit and Netsuite, among others, offer SMEs many options on how to manage their invoices, expenses, payroll, taxes and inventory. Online accounting platforms offer you a cheaper option than when hiring an accountant during the initial stage of your business. Here are a few things to look for:</span></p>
<ul>
<li><strong>Simple interface</strong><span style="font-weight: 400;">: Cloud-based applications at the minimum should offer sensible navigation and data entry forms</span></li>
<li><strong>Subscription model</strong><span style="font-weight: 400;">: Pay-as-you-go model makes online solutions cheaper, and help manage cash-flow.</span></li>
<li><strong>Mobile version</strong><span style="font-weight: 400;">: Get software that lets you access your financial data on your smartphone or tablet</span></li>
<li><strong>Regular reporting</strong><span style="font-weight: 400;">: Make sure to sign up for PAYG options for your taxation payments</span></li>
<li><strong>Quality user support</strong><span style="font-weight: 400;">: Review the after-sales support and 24/7 customer service</span></li>
</ul>',
                'menu_order' => 16,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:40:03',
                'updated_at' => '2018-07-26 09:33:13',
            ),
            11 => 
            array (
                'id' => 12,
                'level_id' => 2,
                'section_id' => 6,
                'parent_id' => NULL,
                'name' => 'Business Banking?',
                'short_name' => 'Business Banking',
                'slug' => 'business-banking',
                'icon' => 'RR9rA0GqY8GkE5PeJPfOqrTLdB7hhqUA.png',
                'hover_icon' => 'fIPXPD3Xa8THJHTGc2FHcPlETWl3Zrnp.png',
                'content' => '<p>Business Banking?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Business Banking',
                'tooltip' => '<p><span style="font-weight: 400;">Many Australian banks are focused on helping small-business owners. A business bank account can help you track your expenses, invoices, and credit line. It can be used for transaction, savings and business term deposit. In Australia, you will need your Australia Company Number and registration with the Australian Security Investments Commission. A few tips to get the best deal:</span></p>
<ul>
<li><strong>Fees</strong><span style="font-weight: 400;">: Negotiate the rates for monthly service fees and other charges</span></li>
<li><strong>Interest rates</strong><span style="font-weight: 400;">: Look for the best competitive rates and related financial products suited for your account</span></li>
<li><strong>Features</strong><span style="font-weight: 400;">: Features such as credit line and e-statements can benefit your small business</span></li>
<li><strong>Accessibility</strong><span style="font-weight: 400;">: Standard features include online banking, telephone banking, debit card and chequebook. Consider if you also need easy access to your business savings</span></li>
</ul>',
                'menu_order' => 17,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:40:03',
                'updated_at' => '2018-07-26 09:33:19',
            ),
            12 => 
            array (
                'id' => 13,
                'level_id' => 2,
                'section_id' => 6,
                'parent_id' => NULL,
                'name' => 'Merchant Facilities?',
                'short_name' => 'Merchant Facilities',
                'slug' => 'merchant-facilities',
                'icon' => 'syBToCVanBCTcV5Q3n4xW2yuTpkQsJQ9.png',
                'hover_icon' => 'AHE670AQZWoUqnnECHSxFeLIcmvO20Eq.png',
                'content' => '<p>Merchant Facilities?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Merchant facilities',
                'tooltip' => '<p><span style="font-weight: 400;">Merchant facilities including ETFPOS terminals and online payments allow you to receive card credit and debit card payments with relative ease. Be sure to take note of policies such as those that limit the card payment surcharges passed on to customers starting September 2017. Different fees apply, including monthly fees and card reader payments. Things to consider:</span></p>
<ul>
<li><strong>Smart readers</strong><span style="font-weight: 400;">: Smart readers include small terminals and those that can attach to your Android or Apple phone to let you process customer payments easily</span></li>
<li><strong>Contactless payments</strong><span style="font-weight: 400;">: Some POS terminals allow you to swipe or insert a chip card, including extra options for tipping</span></li>
<li><strong>Smartphone app</strong><span style="font-weight: 400;">: Customers can install their own app to process shopping as they enter your physical store and you can guide them better with your latest product offerings</span></li>
</ul>',
                'menu_order' => 18,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:41:30',
                'updated_at' => '2018-07-26 09:33:26',
            ),
            13 => 
            array (
                'id' => 14,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Have you set up your business email address?',
                'short_name' => 'Business Email',
                'slug' => 'have-you-set-up-your-business-email-address',
                'icon' => 'wGMbNlI7DppRZH49cm3bAOJ0IJHqLeSI.png',
                'hover_icon' => 'D1OTtMesWejwBtxQdgvOzWqf1TCmL2yg.png',
                'content' => '<p>Have you set up your business email address?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Email Setup',
                'tooltip' => '<p><span style="font-weight: 400;">Setting up your email is one of the main tasks to help you create, collaborate and communicate professionally with clients, suppliers and your team. Select a provider that offers email features tailoured for small businesses. A few things to consider:</span></p>
<ul>
<li><strong>Free or paid</strong><span style="font-weight: 400;">: Free email sign-ups are okay, especially if you are a small start-up; as you grow, setting up a paid email account with your own website domain name makes outgoing communications more professional</span></li>
<li><strong>User policies</strong><span style="font-weight: 400;">: Make sure the administrator provides the right access and tools for each user type</span></li>
<li><strong>Suite of apps</strong><span style="font-weight: 400;">: Calendar for tasking schedules, Documents (for working collaboration) and an online Office equivalent are essential to productivity</span></li>
</ul>',
                'menu_order' => 19,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:31:02',
                'updated_at' => '2018-07-26 09:34:56',
            ),
            14 => 
            array (
                'id' => 15,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Do you have your phone set up?',
                'short_name' => 'Phone Set Up',
                'slug' => 'do-you-have-your-phone-setup',
                'icon' => 'iVpwwBpUTyPiGWeO3s4SxW735KLqlokl.png',
                'hover_icon' => 'u7gunKirDwTEKNkpN4Vh6pyZch8YXZZj.png',
                'content' => '<p>Do you have your phone set up?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Phone Setup',
                'tooltip' => '<p><span style="font-weight: 400;">Incoming and outgoing calls are part of business communications so setting up a separate line from your personal number helps keep your business transactions in order. Set up your business phone number and consider if you need one or a combination of a regular landline, intercom, wireless and/or cloud-based VoIP phones. A few tips:</span></p>
<ul>
<li><span style="font-weight: 400;">Get a local business number and a toll-free international number</span></li>
<li><span style="font-weight: 400;">Record your main message, stating your business name and a customary greeting</span></li>
<li><span style="font-weight: 400;">If you have a team, add extensions for your customer service operations</span></li>
</ul>',
                'menu_order' => 20,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:31:02',
                'updated_at' => '2018-07-26 09:35:03',
            ),
            15 => 
            array (
                'id' => 16,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Do you need a quick office setup?',
                'short_name' => 'Quick Office Setup',
                'slug' => 'do-you-need-a-quick-office-setup',
                'icon' => 'PwMM7zKqYU6TDpMvbuOp7ISNJ3Q6W3Lx.png',
                'hover_icon' => 'hkM0Ko6bna1TefelaLjNnJ6px0V60axL.png',
                'content' => NULL,
                'element' => 'YesAndLinkField',
                'element_data' => '{"question_1":"Do you want a prestigious city office address for postage purposes?","question_2":"Do you require a dedicated receptionist only to answer calls on your behalf?","question_3":"Do you require ad hoc team support?"}',
                'tooltip_title' => 'Quick Office',
            'tooltip' => '<p><span style="font-weight: 400;">Setting up a productivity suite for your office is essential to create and manage business documents for collaboration. There are freewares such as Libre Office, Quickoffice developed by Google for Android devices. Paid software such as Microsoft Office comes with the subscription model Office 365. Online, you can use free G suite (Google Docs, Sheets and Slides). A few tips:</span></p>
<ul>
<li><strong>Document backups</strong><span style="font-weight: 400;">: Making sure you have secondary copy of important documents and making them accessible even when you are out of office is key</span></li>
<li><strong>Security</strong><span style="font-weight: 400;">: Boost your network security using firewall, VPN and antivitus software and install good policies to protect your data</span></li>
<li><strong>Cloud</strong><span style="font-weight: 400;">: Being able to access your documents online and on any device gives you productivity anytime, anywhere</span></li>
</ul>',
                'menu_order' => 21,
                'weight' => NULL,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:31:02',
                'updated_at' => '2018-07-17 08:48:13',
            ),
            16 => 
            array (
                'id' => 17,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Have you set up your internet?',
                'short_name' => 'Internet Set Up',
                'slug' => 'have-you-set-up-your-internet',
                'icon' => 'TdEbxNbuqqUtkn6Kxa2Npq7igjxmg9r6.png',
                'hover_icon' => 'QOagCNggDVnbZsPXYJPt7dWfDfS5JKP6.png',
                'content' => '<p>Have you set up your internet?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Business Internet',
                'tooltip' => '<p><span style="font-weight: 400;">The Internet is one of the main technology solutions that small-business owners rely on to do their work and handle emails for communications. Setting up your Internet connection at your office is usually coupled with a good mobile connection as well to make sure you can process your work wherever you go. A few tips:</span></p>
<ul>
<li><strong>Network security</strong><span style="font-weight: 400;">: While some would prefer using free wifi at coffee shops, it is essential to process sensitive business data using your own connection to avoid breach and ensure data protection.</span></li>
<li><strong>Cloud-based apps</strong><span style="font-weight: 400;">: Cloud based solutions and apps for subscription offer both flexibility and function, and are often accessible on your tablets and mobile</span></li>
<li><strong>Operations without internet</strong><span style="font-weight: 400;">: Run tests to help ensure your business can operate even without the Internet</span></li>
</ul>',
                'menu_order' => 22,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:42:34',
                'updated_at' => '2018-07-26 09:36:03',
            ),
            17 => 
            array (
                'id' => 18,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Do you have office accessories?',
                'short_name' => 'Office Accessories',
                'slug' => 'do-you-have-office-accessories',
                'icon' => 'os2HNqH342Q8tfsMUQA8sEczIo4Cldaz.png',
                'hover_icon' => 'TWUloPtu1SyIvrPjjw4NBw0b7eIzrrPX.png',
                'content' => '<p>Do you have office accessories?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Office Accessories',
                'tooltip' => '<p><span style="font-weight: 400;">Enabling your team to work comfortably and stay organised in your office is essential to boost your staff morale and productivity. While considered as accessories, this simple equipment list includes the essential to make sure your communications and business documents are handled efficiently and securely. Here are some essential accessories to help you your team run the business smoothly:</span></p>
<ul>
<li><span style="font-weight: 400;">Get some noise cancelling headphones to remove any distractions and stay focussed. &nbsp;This is especially true if working from home or in a shared office space.</span></li>
<li><span style="font-weight: 400;">Stay organised, plan from the outset to keep organised, it&rsquo;s easy to maintain but hard to back track. &nbsp;Folio&rsquo;s, clear tabs and markings will make your life a lot easier later - get into the habit now! </span></li>
<li><span style="font-weight: 400;">This includes your computer, keep files organised, here is a great article to take you through it, step by step: </span><a href="http://www.asianefficiency.com/organization/organizing-files-folders-documents/"><span style="font-weight: 400;">http://www.asianefficiency.com/organization/organizing-files-folders-documents/</span></a></li>
<li><span style="font-weight: 400;">Project management software like Asana, is free, and makes keeping projects on track easier. &nbsp;At the end of the day you still need to do the work!</span></li>
</ul>',
                'menu_order' => 23,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:42:34',
                'updated_at' => '2018-07-26 09:36:08',
            ),
            18 => 
            array (
                'id' => 19,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Join a business community',
                'short_name' => 'Join a business community',
                'slug' => 'join-a-business-community',
                'icon' => 'dBzPZoVL2vaqLyb8xeKxkjLhmCajn9C3.png',
                'hover_icon' => 'cIEJ1sLbgdDba8Dc75GRPGYhkb46yvWG.png',
                'content' => '<p>Join a business community</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Join a business community',
                'tooltip' => '<p>Joining a business community allows you to bounce ideas off others, and learn from the mistakes and experiences of those that have gone through it all. Have you considered joining one today?</p>',
                'menu_order' => 24,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:42:34',
                'updated_at' => '2018-07-26 09:36:15',
            ),
            19 => 
            array (
                'id' => 20,
                'level_id' => 3,
                'section_id' => 8,
                'parent_id' => NULL,
                'name' => 'SWOT?',
                'short_name' => 'SWOT',
                'slug' => 'swot',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>SWOT</p>',
                'menu_order' => 28,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2017-11-23 07:49:19',
                'updated_at' => '2018-07-26 09:36:25',
            ),
            20 => 
            array (
                'id' => 21,
                'level_id' => 3,
                'section_id' => 8,
                'parent_id' => NULL,
                'name' => 'Customer Analysis?',
                'short_name' => 'Customer Analysis',
                'slug' => 'customer-analysis',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>Customer Analysis?</p>',
                'menu_order' => 29,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:52:02',
                'updated_at' => '2018-07-26 09:36:41',
            ),
            21 => 
            array (
                'id' => 22,
                'level_id' => 3,
                'section_id' => 8,
                'parent_id' => NULL,
                'name' => 'Demographic catchment area?',
                'short_name' => 'Demographic catchment area',
                'slug' => 'demographic-catchment-area',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>Demographic catchment area</p>',
                'menu_order' => 30,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:52:02',
                'updated_at' => '2018-07-26 09:36:49',
            ),
            22 => 
            array (
                'id' => 23,
                'level_id' => 3,
                'section_id' => 8,
                'parent_id' => NULL,
                'name' => 'Social media execution?',
                'short_name' => 'Social media execution',
                'slug' => 'social-media-execution',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>Social media execution</p>',
                'menu_order' => 31,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:52:02',
                'updated_at' => '2018-07-26 09:36:59',
            ),
            23 => 
            array (
                'id' => 24,
                'level_id' => 3,
                'section_id' => 8,
                'parent_id' => NULL,
                'name' => 'Budget?',
                'short_name' => 'Budget',
                'slug' => 'budget',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>Budget</p>',
                'menu_order' => 32,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:52:02',
                'updated_at' => '2018-07-26 09:37:05',
            ),
            24 => 
            array (
                'id' => 25,
                'level_id' => 3,
                'section_id' => 9,
                'parent_id' => NULL,
                'name' => 'Have you kept a legal adviser?',
                'short_name' => 'Legal Advisor',
                'slug' => 'have-you-kept-a-legal-adviser',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>Have you kept a legal adviser?</p>',
                'menu_order' => 33,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:52:02',
                'updated_at' => '2018-07-26 09:37:12',
            ),
            25 => 
            array (
                'id' => 26,
                'level_id' => 3,
                'section_id' => 10,
                'parent_id' => NULL,
                'name' => 'Do you have employment contracts already?',
                'short_name' => 'Employment Contracts',
                'slug' => 'do-you-have-employment-contracts-already',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
            'tooltip' => '<p>A written employment contract is an important legal document, which serves as an agreement between an employer and employee (casual, fixed-term, part-time and full-time). It should provide the legal minimums set under the National Employment Standards (NES) and other applicable registered awards. Some key points to answer:</p>
<p>1. Is the contract in the name of the proper employing entity and filed with the right legal jurisdiction?</p>
<p>2. Is there a probation period and for how long?</p>
<p>3. Are there bonused or incentives and are they intended to be discretionary?</p>
<p>4. If your business pays annualised salaries, is there an effective clause?</p>
<p>5. Is your confidential information sufficiently defined and protected?</p>
<p>6. Does the written contract contain the entire agreement or it has additional related documents?</p>
<p>&nbsp;</p>',
                'menu_order' => 34,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:48:57',
                'updated_at' => '2018-07-26 09:37:17',
            ),
            26 => 
            array (
                'id' => 27,
                'level_id' => 3,
                'section_id' => 10,
                'parent_id' => NULL,
                'name' => 'Award Wages?',
                'short_name' => 'Award Wages',
                'slug' => 'award-wages',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
            'tooltip' => '<p>Awards (modern awards) outline the minimum pay rates and legal conditions of employment for your business. There are 122 industry or occupation awards for Australian workers. The pay guides have minimum pay rates for full-time, part-time and casual employees in an award, including monetary allowances and penalty rates. Take note:</p>
<p>&middot; Calculate minimum wages with Fair Work&rsquo;s Pay Calculator or use the Pay guides.</p>
<p>&middot; A small business can have two different awards based on job classifications. For example, a construction company should follow the Building and Construction Award and Clerks Award schemes for its carpenters and administration staff, respectively.</p>
<p>&middot; Comply with recent policies such as the superannuation guarantee (SG) compliance by employers, whilst calling for more frequent employer payslip reporting</p>
<p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap;">&nbsp;</span></p>',
                'menu_order' => 35,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:48:57',
                'updated_at' => '2018-07-26 09:37:23',
            ),
            27 => 
            array (
                'id' => 28,
                'level_id' => 3,
                'section_id' => 10,
                'parent_id' => NULL,
                'name' => 'Do you have your HR Policy & Workplace Health and Safety in a place?',
                'short_name' => 'HR Policy',
                'slug' => 'hr-policy',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
            'tooltip' => '<p>Business owners have an important responsibility to ensure Workplace Health and Safety (WHS) Act guidelines are met. (You may refer to the Safe Work Australia website).</p>
<p>A safe working environment maximizes productivity and reduces associated costs with injuries and illnesses among your team members. Providing a safe environment for work is more than having a first aid kit readily available. Here are seven common hazards at work and how to manage them:</p>
<p>&middot; Manual handling of heavy items &ndash; use a trolley to cart items</p>
<p>&middot; Electrical &ndash; install surge and overload protection on all powerboards of your computers and important electrical equipment</p>
<p>&middot; Fire &ndash; have an evacuation plan and fire extinguisher on-site</p>
<p>&middot; Slip and fall &ndash; place signage for wet or slippery floors</p>
<p>&middot; Sun protection &ndash; provide sunscreens with spectrum of 50+ to field workers</p>
<p>&middot; Visibility &ndash; give high-visibility wear for your staff and site visitors</p>
<p>&middot; First aid &ndash; restock items that are already expired</p>
<p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap;">&nbsp;</span></p>',
                'menu_order' => 36,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:48:57',
                'updated_at' => '2018-07-26 09:37:29',
            ),
            28 => 
            array (
                'id' => 29,
                'level_id' => 3,
                'section_id' => 11,
                'parent_id' => NULL,
                'name' => 'Book keeping?',
                'short_name' => 'Book keeping',
                'slug' => 'book-keeping',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>Book keeping?</p>',
                'menu_order' => 37,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:48:22',
                'updated_at' => '2018-07-26 09:37:38',
            ),
            29 => 
            array (
                'id' => 30,
                'level_id' => 3,
                'section_id' => 11,
                'parent_id' => NULL,
                'name' => 'Cash Flow Forecasting?',
                'short_name' => 'Cash Flow Forecasting',
                'slug' => 'cash-flow-forecasting',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>Cash Flow Forecasting</p>',
                'menu_order' => 38,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:48:22',
                'updated_at' => '2018-07-26 09:38:13',
            ),
            30 => 
            array (
                'id' => 31,
                'level_id' => 3,
                'section_id' => 12,
                'parent_id' => NULL,
                'name' => 'Office space?',
                'short_name' => 'Office space',
                'slug' => 'office-space',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>For SMEs, office space costs is undoubtedly the second largest expense next to wages. A few tips to help you make the right decision:</p>
<p>1. Check cheaper alternatives. If renting a physical office is pricey, consider a virtual office or share co-working spaces.</p>
<p>2. Negotiate a lease. If a deal does not suit you, walk away and check another property.</p>
<p>3. Research current market prices. Go online, speak to agents and ask around for prices and incentives in your chosen location.</p>
<p>4. Get a heads of agreement in writing. A Heads of Agreement (aka Commercial Terms) is a short two- to five-page document that lists of all of the key things you want the lease to stipulate. Seek legal advice or commercial advice before you sign the heads of agreement.</p>
<p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap;">&nbsp;</span></p>',
                'menu_order' => 39,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:50:23',
                'updated_at' => '2018-07-26 09:38:18',
            ),
            31 => 
            array (
                'id' => 32,
                'level_id' => 3,
                'section_id' => 12,
                'parent_id' => NULL,
                'name' => 'Store Lease?',
                'short_name' => 'Store Lease',
                'slug' => 'store-lease',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>Retail Store</p>
<p>Leasing On the legal side, Australian retail shop leases must comply with the Retail Shop Leases Act of 1994. Some basic rules to follow:</p>
<p>&middot; Set aside no more than 10% of gross monthly sales for your lease</p>
<p>&middot; Have your solicitor read any lease before you sign to ensure the terms and conditions are appropriate.</p>
<p>&middot; If you operate a home business, consult local council policies on how many people can work there. Consult with the local council.</p>
<p>&middot; Checkout incentives and negotiate it out with the length of your lease term</p>
<p>&middot; Compute other recurring items related to lease such as property taxes, insurance, maintenance and construction</p>
<p>Cafe Store Leasing</p>
<p>&middot; Seek legal, financial and business advice on the lease before making a decision Cafe Store Leasing Caf&eacute; spaces for lease provide growing small businesses an option to locate commercially at highly profitable urban centres with high foot traffic. Online directories list up numerous caf&eacute; spaces for lease across Australia. Caf&eacute; shops with a reliable Internet connection sweetens the deal for Aussies prefer coffee as their beverage for both work and leisure. If you want to lease a co-working space at a caf&eacute; shop, check these tips:</p>
<p>&middot; Determine the seats you need and if you will require hourly or monthly lease</p>
<p>&middot; Request separate wifi logins for business customers to protect your data</p>
<p>&middot; Go through the lease carefully and know if you can avail of discounts on selected coffee beverages or the house blend can come free as incentive</p>
<p>Warehouse Leasing</p>
<p>Running a small business means maximizing your assets, including your warehouse space. Storing up your products at the warehouse should correspond to easy inventory checks and easy deliver to your store locations and clients. A few tips:</p>
<p>&middot; Create a smart layout: A logical warehouse layout lets you access your items easily and tick them off the inventory file</p>
<p>&middot; Digitise. Off-the-shelf warehouse management software let you maximise your floor space, especially in terms of where to place your bestsellers and items you need less often</p>
<p>&middot; Quick delivery time. Proximity to your store and to roads/ports is essential to makesure your item is delivered on time. Rent. Balance your lease costs with above criteria</p>',
                'menu_order' => 40,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:50:23',
                'updated_at' => '2018-07-26 09:38:25',
            ),
            32 => 
            array (
                'id' => 33,
                'level_id' => 3,
                'section_id' => 12,
                'parent_id' => NULL,
                'name' => 'Do you need a hardware?',
                'short_name' => 'Hardware',
                'slug' => 'do-you-need-a-hardware',
                'icon' => 'general.png',
                'hover_icon' => 'general.png',
                'content' => '<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => '<p>Do you need a hardware?</p>',
                'menu_order' => 41,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-07 16:50:23',
                'updated_at' => '2018-07-26 09:38:30',
            ),
            33 => 
            array (
                'id' => 34,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => 9,
                'name' => 'Set up your Facebook business account',
                'short_name' => 'Facebook',
                'slug' => 'set-up-your-facebook-business-account',
                'icon' => 'SRMIDj9FRSsjwgT1jsw6lDyo3bqUfUEO.png',
                'hover_icon' => 'tOq1T76cIsqCIdheYwwWX9yJuhgSPgk6.png',
                'content' => '<p>Set up your Facebook business account</p>
<p>&nbsp;</p>
<p><a class="btn btn-default btn-lg btn-alert m-20" href="https://www.facebook.com/pages/creation/" target="_blank" rel="noopener">Register</a></p>
<p>&nbsp;</p>
<p class="content-p">Already have a Facebook business profile? Enter your Facebook profile URL here</p>
<p class="content-p">[SocialMediaField]</p>',
                'element' => 'SocialMediaField',
                'element_data' => NULL,
                'tooltip_title' => 'Facebook',
                'tooltip' => '<p>With 65 million pages and eight million business profiles, Facebook is a useful platform for small businesses worldwide. The social media channel has tools to help SMEs reach their audience more effectively. These tools include:</p>
<ul>
<li><strong>Ads Manager:</strong>&nbsp;This app helps schedule advertising campaigns, plan the budget and monitor each week how the ad account performs.</li>
<li><strong>Creative Studio:</strong>&nbsp;Create mock-ups of ads and get a preview of how they will enhance audience interaction with your marketing pages.</li>
<li><strong>Blueprint:</strong>&nbsp;Learn the modules about Facebook advertising tools and get certified using the Blueprint Certification program.</li>
<li><strong>Single Inbox:</strong>&nbsp;Manage all your messages across Facebook, Messenger and Instagram to be able to reply and reach your audiences.</li>
</ul>',
                'menu_order' => 10,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-06-08 14:35:18',
                'updated_at' => '2018-07-26 09:32:06',
            ),
            34 => 
            array (
                'id' => 35,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => 9,
                'name' => 'Set up your twitter account',
                'short_name' => 'Twitter',
                'slug' => 'set-up-your-twitter-account',
                'icon' => '5t0WGAkAjwRzb8qGvkSfRIZ2RIKtrVBJ.png',
                'hover_icon' => 'cljdnHAuutU58W09FVchoh09s81oKX8r.png',
                'content' => '<p>Set up your twitter account</p>
<p>&nbsp;</p>
<p><a class="btn btn-default btn-lg btn-alert m-20" href="https://twitter.com/signup" target="_blank" rel="noopener">Register</a></p>
<p>&nbsp;</p>
<p class="content-p">Already have a twitter account? Enter your twitter account URL here</p>
<p class="content-p">[SocialMediaField]</p>',
                'element' => 'SocialMediaField',
                'element_data' => NULL,
                'tooltip_title' => 'Twitter',
                'tooltip' => '<p>With at least 300 million users and a varied demographic, Twitter is a good platform for content marketing. The social media channel is a good way to engage with audiences using #hashtags, @mentions, short links, images, videos and conversations. Here are a handful of tips to use Twitter effectively:</p>
<ul>
<li><strong>Use the right hashtag:</strong>&nbsp;This can help your tweet get discovered by more active users, especially if it is related to a trending topic. Twitter analytics can identify which hashtags perform better.</li>
<li><strong>Tag relevant profiles:</strong>&nbsp;Mention industry personalities and thought leaders in your post or image to boost engagement.</li>
<li><strong>Tweet at optimal times:</strong>&nbsp;Know which time of the day is the best chance to deliver your posts to your target audience.</li>
</ul>',
                'menu_order' => 11,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-06-08 14:38:46',
                'updated_at' => '2018-07-26 09:32:23',
            ),
            35 => 
            array (
                'id' => 36,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => 9,
                'name' => 'Set up your LinkedIn business account',
                'short_name' => 'Linkedin',
                'slug' => 'set-up-your-linkedin-business-account',
                'icon' => 'dBiP2U84tGv2nC44PXOzOAeqSRRHkvFa.png',
                'hover_icon' => 'Al8ycnV8r31KxAzomKaiG4BV5sK0isBY.png',
                'content' => '<p>Set up your LinkedIn business account</p>
<p>&nbsp;</p>
<p><a class="btn btn-default btn-lg btn-alert m-20" href="https://www.linkedin.com/start/join" target="_blank" rel="noopener">Register</a></p>
<p>&nbsp;</p>
<p class="content-p">Already have a LinkedIn company page? Enter your company page URL here</p>
<p class="content-p">[SocialMediaField]</p>',
                'element' => 'SocialMediaField',
                'element_data' => NULL,
                'tooltip_title' => 'Linkedin',
                'tooltip' => '<p>Over 400 million users have a Linkedin page, making it a good platform when starting your social media marketing strategy, especially with the recommendations function. Here are some tips:</p>
<ul>
<li><strong>Create a profile for lead generation:</strong>Make sure that your profile has your updated details and contact information and will lead people to go to your corporate website for more information.</li>
<li><strong>Post your best content:</strong>&nbsp;Highlight your business milestones and provides useful content that can help solve your audience&rsquo;s problems.</li>
<li><strong>Advocate for your brand:</strong>&nbsp;Add a human angle to your posts to engage with your audiences. Fun, behind-the-scenes content can also promote connections with your audience and turn them into active followers.</li>
</ul>',
                'menu_order' => 12,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-06-08 14:40:22',
                'updated_at' => '2018-07-26 09:32:33',
            ),
            36 => 
            array (
                'id' => 37,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => 9,
                'name' => 'Set up your Instagram account',
                'short_name' => 'Instagram',
                'slug' => 'set-up-your-instagram-account',
                'icon' => 'giDGatNTkcLzCQ58LS1mYA8om0RWljCt.png',
                'hover_icon' => 'CIXFjl9VULq5xCR945kxgiDT25YQuHoj.png',
                'content' => '<p>Set up your Instagram account</p>
<p>&nbsp;</p>
<p><a class="btn btn-default btn-lg btn-alert m-20" href="https://business.instagram.com/getting-started" target="_blank" rel="noopener">Register</a></p>
<p>&nbsp;</p>
<p class="content-p">Already have an instagram business profile? Enter your instagram profile URL here</p>
<p class="content-p">[SocialMediaField]</p>',
                'element' => 'SocialMediaField',
                'element_data' => NULL,
                'tooltip_title' => 'Instagram',
                'tooltip' => '<p>With over seven million monthly active Instagram users on the platform in Australia, there is a real opportunity for you to engage customers with the right visual content strategy.</p>
<ul>
<li><strong>Set up a business account:</strong>&nbsp;Use a consistent photo and name that goes along with your branding strategy.</li>
<li><strong>Showcase fresh content:</strong>&nbsp;Simple images that tell a story is a powerful way to connect with your audience.</li>
<li><strong>Use Business Tools:</strong>&nbsp;This free tool gives you business insights and to identify which posts work best for audience engagement.</li>
<li><strong>Link your account with Facebook:</strong>Connecting these two can help boost your marketing efforts.</li>
<li><strong>Create interactive hashtags:</strong>&nbsp;When planned well, the use of correct hashtags related to your brand or new product can result in free advertising once your followers use them to tag their own photos.</li>
</ul>',
                'menu_order' => 13,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-06-08 14:42:01',
                'updated_at' => '2018-07-26 09:32:41',
            ),
            37 => 
            array (
                'id' => 38,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => 16,
                'name' => 'Do you want a prestigious city office address for postage purposes?',
                'short_name' => 'Prestigious City Office',
                'slug' => 'do-you-want-a-prestigious-city-office-address-for-postage-purposes',
                'icon' => '2zXMlIALJK5KNuhbabZiNnDBCDwknkNN.png',
                'hover_icon' => '9fO35J21RZkzbBk8HunDF8X6iWXRARoe.png',
                'content' => '<p>Do you want a prestigious city office address for postage purposes?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Why an Office Address is Important for Reputation',
                'tooltip' => '<p>Your businesses address is an important part of your reputation, don\'t take the risk with a PO box or home address. Servcorp&rsquo;s Address Package provides you an address in a landmark building for use on all your company communications.</p>
<p>Businesses like&nbsp;to know where their suppliers are based. &nbsp;Don\'t risk your first impression&nbsp;with a PO box or a home address. &nbsp;Our Address Package allows you to grow your business with:</p>
<ul>
<li>A prestigious address for your business cards and company correspondence</li>
<li>Mail and courier management services to ensure you can receive your mail, no matter where you are</li>
<li>Worldwide complimentary access to any executive coworking lounge for up to 1 hour per day</li>
<li>Secure high speed Wi-Fi in coworking lounge and private offices</li>
</ul>
<p>Including&nbsp;the standard Servcorp 5-star benefits:</p>
<ul>
<li>Membership flexibility with easy month-by-month contracts</li>
<li>No security deposit when paying with a credit card</li>
<li>Access to a personal assistant for regular or last-minute tasks</li>
<li>First month free, with no further obligation</li>
</ul>',
                'menu_order' => 25,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-06-08 14:55:13',
                'updated_at' => '2018-07-26 09:35:45',
            ),
            38 => 
            array (
                'id' => 39,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => 16,
                'name' => 'Do you require a dedicated receptionist only to answer calls on your behalf?',
                'short_name' => 'Dedicated Receptionist',
                'slug' => 'do-you-require-a-dedicated-receptionist-only-to-answer-calls-on-your-behalf',
                'icon' => 'Urd23z4lqZp3E0i4WIWpIGJLYTwuu3Ag.png',
                'hover_icon' => 'DbWzRSO7hZQg5HeFUw0jMsSEVCgIFwYX.png',
                'content' => '<p>Do you require a dedicated receptionist only to answer calls on your behalf?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => NULL,
                'menu_order' => 26,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-06-08 14:58:55',
                'updated_at' => '2018-07-26 09:35:50',
            ),
            39 => 
            array (
                'id' => 40,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => 16,
                'name' => 'Do you require ad hoc team support?',
                'short_name' => 'Ad Hoc Team Support',
                'slug' => 'do-you-require-ad-hoc-team-support',
                'icon' => 'rOpx8X06JXixgitZXjLMvHOj7k0p4KK3.png',
                'hover_icon' => 'p2L3Oz5ftRmx3K9qzfgefUCxk0mQAGMQ.png',
                'content' => '<p>Do you require ad hoc team support?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => NULL,
                'tooltip' => NULL,
                'menu_order' => 27,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-06-08 15:09:07',
                'updated_at' => '2018-07-26 09:35:55',
            ),
            40 => 
            array (
                'id' => 41,
                'level_id' => 3,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Initial Website Setup',
                'short_name' => 'Website Setup',
                'slug' => 'initial-website-setup',
                'icon' => 'rJIGXGQ7SaTevZyMNBBKsUx3xQuv0l9g.png',
                'hover_icon' => 'GpXuFNdcMlYvgeTfhwWTle4MRECYONLV.png',
                'content' => '<p>Do you require an initial website setup?</p>
<p>[YesAndLinkField]</p>',
                'element' => 'YesAndLinkField',
                'element_data' => NULL,
                'tooltip_title' => 'Initial Website',
                'tooltip' => '<p>Not having a website means you&rsquo;re losing out on potential customers. The excuse of websites being too complicated or too expensive to create is no longer valid.&nbsp; There are many tools to get you up and running quickly.&nbsp; Have A Look specialise in ultra affordable, responsive mobile optimised sites to get you up and running <em>fast</em>.</p>',
                'menu_order' => 15,
                'weight' => 1,
                'template' => 'modal_box',
                'show_everywhere' => 1,
                'is_active' => 1,
                'created_at' => '2018-06-21 07:17:28',
                'updated_at' => '2018-07-26 09:33:06',
            ),
        ));
        
        
    }
}