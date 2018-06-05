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
					'slug' => 'what-industry-is-your-business-idea-in',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => '<p>Select the best fit below. Don\'t worry you can always change your selection later.</p>',
					'element' => 'BusinessCategories',
					'element_data' => NULL,
					'tooltip' => NULL,
					'tooltip_title' => '',
					'menu_order' => 1,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => NULL,
					'updated_at' => '2018-05-25 03:15:32',
				),
			1 =>
				array (
					'id' => 2,
					'level_id' => 1,
					'section_id' => 1,
					'parent_id' => NULL,
					'name' => 'Will you also be selling goods online?',
					'slug' => 'will-you-also-be-selling-goods-online',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'SellGoods',
					'element_data' => NULL,
					'tooltip' => NULL,
					'tooltip_title' => '',
					'menu_order' => 2,
					'weight' => 1,
					'show_everywhere' => 0,
					'created_at' => '2018-01-07 10:43:38',
					'updated_at' => '2018-05-25 03:11:14',
				),
			2 =>
				array (
					'id' => 3,
					'level_id' => 1,
					'section_id' => 2,
					'parent_id' => NULL,
					'name' => 'Great Now lets create your account',
					'slug' => 'great-now-lets-create-your-account',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'RegisterUser',
					'element_data' => NULL,
					'tooltip' => NULL,
					'tooltip_title' => '',
					'menu_order' => 3,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:28:17',
					'updated_at' => '2018-05-25 03:11:34',
				),
			3 =>
				array (
					'id' => 4,
					'level_id' => 1,
					'section_id' => 3,
					'parent_id' => NULL,
					'name' => 'So tell us about your business',
					'slug' => 'so-tell-us-about-your-business',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'CreateBusiness',
					'element_data' => NULL,
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
					'tooltip_title' => '',
					'menu_order' => 4,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:29:09',
					'updated_at' => '2018-05-25 04:09:07',
				),
			4 =>
				array (
					'id' => 5,
					'level_id' => 1,
					'section_id' => 4,
					'parent_id' => NULL,
					'name' => 'Register Your Business',
					'slug' => 'register-your-business',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'RegisterBusiness',
					'element_data' => NULL,
					'tooltip' => NULL,
					'tooltip_title' => '',
					'menu_order' => 5,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:30:17',
					'updated_at' => '2018-05-25 03:12:10',
				),
			5 =>
				array (
					'id' => 6,
					'level_id' => 2,
					'section_id' => 5,
					'parent_id' => NULL,
					'name' => 'Do you have a logo?',
					'slug' => 'do-you-have-a-logo',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'Logo',
					'element_data' => NULL,
					'tooltip' => '<p><span style="font-weight: 400;">A logo is a symbol of your business identity and brand. As a visual representation of what your small business stands for, a logo identifies your company and product. In tandem with a good logo, a corporate tagline defines your mission statement in a few words or a powerful catchphrase. Both reinforce your brand message. What makes for a good logo and a catchy tagline?</span></p>
<ul>
<li><strong>Memorable</strong><span style="font-weight: 400;">: A simple logo and a catchy tagline that easily grabs people&rsquo;s attention and leaves a good lasting impression</span></li>
<li><strong>Has clear benefit</strong><span style="font-weight: 400;">: A logo and tagline serve as mini-mission statements of the company&rsquo;s overall brand objective</span></li>
<li><strong>Elicits positive feelings</strong><span style="font-weight: 400;">: Both should promote positive emotions and values that the consumer can identify with your product or service</span></li>
</ul>
<p>&nbsp;</p>',
					'tooltip_title' => 'Logo',
					'menu_order' => 6,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:49:28',
					'updated_at' => '2018-05-25 03:07:33',
				),
			6 =>
				array (
					'id' => 7,
					'level_id' => 2,
					'section_id' => 5,
					'parent_id' => NULL,
					'name' => 'Enter your tagline or create one now',
					'slug' => 'enter-your-tagline-or-create-one-now',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'Tagline',
					'element_data' => NULL,
					'tooltip' => '<p>Small businesses need a strong brand name to set themselves apart from competitors. Any name, whether it is abstract or informative, can be effective if backed by an appropriate marketing strategy. A few tips: &middot;</p>
<ul>
<li>Your name is simple, unique and conveys your brand personality.</li>
<li>It has an available domain name for your web presence and online business.</li>
<li>Your name is not confusing (not misunderstood).</li>
</ul>
<p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap;">&nbsp;</span></p>',
					'tooltip_title' => '',
					'menu_order' => 7,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:49:28',
					'updated_at' => '2018-05-25 03:13:05',
				),
			7 =>
				array (
					'id' => 8,
					'level_id' => 2,
					'section_id' => 5,
					'parent_id' => NULL,
					'name' => 'Select Your Brand Colour',
					'slug' => 'select-your-brand-color',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'BrandColor',
					'element_data' => NULL,
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
					'tooltip_title' => 'Brand Colour',
					'menu_order' => 8,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:51:54',
					'updated_at' => '2018-05-25 03:08:14',
				),
			8 =>
				array (
					'id' => 9,
					'level_id' => 2,
					'section_id' => 5,
					'parent_id' => NULL,
					'name' => 'Social Media Registration',
					'slug' => 'social-media-registration',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'SocialMediaRegistration',
					'element_data' => NULL,
					'tooltip' => '<p><span style="font-weight: 400;">Using social media to boost your marketing and eventually, your sales strategy relies on understanding how to better serve your customers. Social media marketing allows you to reinforce your brand value and proposition while promoting constant connections with your customers.</span></p>
<p><span style="font-weight: 400;">To start your social media marketing journey, it pays to know the following:</span></p>
<ul>
<li><strong>Ready your information for registration</strong><span style="font-weight: 400;">: Have an email for registration and a list of your business name, website or physical location and contact number.</span></li>
<li><strong>Identify channels to use</strong><span style="font-weight: 400;">: Listen to your audience to better identify what social media channels they use.</span></li>
<li><strong>Define your content strategy</strong><span style="font-weight: 400;">: Create a social media handle and hashtag unique to your brand and incorporate SEO keywords.</span></li>
</ul>',
					'tooltip_title' => 'Social Media Registration',
					'menu_order' => 9,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:52:43',
					'updated_at' => '2018-05-25 03:09:11',
				),
			9 =>
				array (
					'id' => 10,
					'level_id' => 2,
					'section_id' => 6,
					'parent_id' => NULL,
					'name' => 'Financing Option?',
					'slug' => 'financing-option',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'FinancingOption',
					'element_data' => NULL,
					'tooltip' => '<p><span style="font-weight: 400;">While most small businesses have no standard capital required, drawing a plan on how to secure new capital for growth is vital. List down your options on where to get money to increase your initial capital and meet your budget needs.</span></p>
<ul>
<li><strong>Bootstrapping</strong><span style="font-weight: 400;">: Many successful entrepreneurs launch start-ups with little capital, using their own savings</span></li>
<li><strong>Family and friends</strong><span style="font-weight: 400;">: You can also ask for help for additional capital but be sure to pay them based on the agreed schedule</span></li>
<li><strong>Bank loans</strong><span style="font-weight: 400;">: Ask for short-, mid- or long-term financing but make sure you can cover the interest rates and return the principal amount borrowed</span></li>
<li><strong>Venture capital and angel investors</strong><span style="font-weight: 400;">: This is an option if your business has a good cashflow history and bankable reputation</span></li>
<li><strong>Government loans</strong><span style="font-weight: 400;">: Check their offerings and compare payment rates</span></li>
</ul>',
					'tooltip_title' => 'Financing Options',
					'menu_order' => 10,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:55:03',
					'updated_at' => '2018-05-25 03:01:36',
				),
			10 =>
				array (
					'id' => 11,
					'level_id' => 2,
					'section_id' => 6,
					'parent_id' => NULL,
					'name' => 'Initial accounting software?',
					'slug' => 'initial-account-software',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'InitialAccountSoftware',
					'element_data' => NULL,
					'tooltip' => '<p><span style="font-weight: 400;">Bookkeeping is a much-needed function in managing your finance. Offerings from Xero, Intuit and Netsuite, among others, offer SMEs many options on how to manage their invoices, expenses, payroll, taxes and inventory. Online accounting platforms offer you a cheaper option than when hiring an accountant during the initial stage of your business. Here are a few things to look for:</span></p>
<ul>
<li><strong>Simple interface</strong><span style="font-weight: 400;">: Cloud-based applications at the minimum should offer sensible navigation and data entry forms</span></li>
<li><strong>Subscription model</strong><span style="font-weight: 400;">: Pay-as-you-go model makes online solutions cheaper, and help manage cash-flow.</span></li>
<li><strong>Mobile version</strong><span style="font-weight: 400;">: Get software that lets you access your financial data on your smartphone or tablet</span></li>
<li><strong>Regular reporting</strong><span style="font-weight: 400;">: Make sure to sign up for PAYG options for your taxation payments</span></li>
<li><strong>Quality user support</strong><span style="font-weight: 400;">: Review the after-sales support and 24/7 customer service</span></li>
</ul>',
					'tooltip_title' => 'Initial accounting software',
					'menu_order' => 11,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:55:03',
					'updated_at' => '2018-05-25 03:02:35',
				),
			11 =>
				array (
					'id' => 12,
					'level_id' => 2,
					'section_id' => 6,
					'parent_id' => NULL,
					'name' => 'Business Banking?',
					'slug' => 'business-banking',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'BusinessBanking',
					'element_data' => NULL,
					'tooltip' => '<p><span style="font-weight: 400;">Many Australian banks are focused on helping small-business owners. A business bank account can help you track your expenses, invoices, and credit line. It can be used for transaction, savings and business term deposit. In Australia, you will need your Australia Company Number and registration with the Australian Security Investments Commission. A few tips to get the best deal:</span></p>
<ul>
<li><strong>Fees</strong><span style="font-weight: 400;">: Negotiate the rates for monthly service fees and other charges</span></li>
<li><strong>Interest rates</strong><span style="font-weight: 400;">: Look for the best competitive rates and related financial products suited for your account</span></li>
<li><strong>Features</strong><span style="font-weight: 400;">: Features such as credit line and e-statements can benefit your small business</span></li>
<li><strong>Accessibility</strong><span style="font-weight: 400;">: Standard features include online banking, telephone banking, debit card and chequebook. Consider if you also need easy access to your business savings</span></li>
</ul>',
					'tooltip_title' => 'Business Banking',
					'menu_order' => 12,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:55:03',
					'updated_at' => '2018-05-25 03:03:27',
				),
			12 =>
				array (
					'id' => 13,
					'level_id' => 2,
					'section_id' => 6,
					'parent_id' => NULL,
					'name' => 'Merchant Facilities?',
					'slug' => 'merchant-facilities',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'MerchantFacilities',
					'element_data' => NULL,
					'tooltip' => '<p><span style="font-weight: 400;">Merchant facilities including ETFPOS terminals and online payments allow you to receive card credit and debit card payments with relative ease. Be sure to take note of policies such as those that limit the card payment surcharges passed on to customers starting September 2017. Different fees apply, including monthly fees and card reader payments. Things to consider:</span></p>
<ul>
<li><strong>Smart readers</strong><span style="font-weight: 400;">: Smart readers include small terminals and those that can attach to your Android or Apple phone to let you process customer payments easily</span></li>
<li><strong>Contactless payments</strong><span style="font-weight: 400;">: Some POS terminals allow you to swipe or insert a chip card, including extra options for tipping</span></li>
<li><strong>Smartphone app</strong><span style="font-weight: 400;">: Customers can install their own app to process shopping as they enter your physical store and you can guide them better with your latest product offerings</span></li>
</ul>',
					'tooltip_title' => 'Merchant facilities',
					'menu_order' => 13,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:56:30',
					'updated_at' => '2018-05-25 03:04:28',
				),
			13 =>
				array (
					'id' => 14,
					'level_id' => 2,
					'section_id' => 7,
					'parent_id' => NULL,
					'name' => 'Have you set up your business email address?',
					'slug' => 'have-you-set-up-your-business-email-address',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'BusinessEmailSetUp',
					'element_data' => NULL,
					'tooltip' => '<p><span style="font-weight: 400;">Setting up your email is one of the main tasks to help you create, collaborate and communicate professionally with clients, suppliers and your team. Select a provider that offers email features tailoured for small businesses. A few things to consider:</span></p>
<ul>
<li><strong>Free or paid</strong><span style="font-weight: 400;">: Free email sign-ups are okay, especially if you are a small start-up; as you grow, setting up a paid email account with your own website domain name makes outgoing communications more professional</span></li>
<li><strong>User policies</strong><span style="font-weight: 400;">: Make sure the administrator provides the right access and tools for each user type</span></li>
<li><strong>Suite of apps</strong><span style="font-weight: 400;">: Calendar for tasking schedules, Documents (for working collaboration) and an online Office equivalent are essential to productivity</span></li>
</ul>',
					'tooltip_title' => 'Email Setup',
					'menu_order' => 14,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:46:02',
					'updated_at' => '2018-05-25 02:57:22',
				),
			14 =>
				array (
					'id' => 15,
					'level_id' => 2,
					'section_id' => 7,
					'parent_id' => NULL,
					'name' => 'Do you have your phone set up?',
					'slug' => 'do-you-have-your-phone-setup',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'PhoneSetUp',
					'element_data' => NULL,
					'tooltip' => '<p><span style="font-weight: 400;">Incoming and outgoing calls are part of business communications so setting up a separate line from your personal number helps keep your business transactions in order. Set up your business phone number and consider if you need one or a combination of a regular landline, intercom, wireless and/or cloud-based VoIP phones. A few tips:</span></p>
<ul>
<li><span style="font-weight: 400;">Get a local business number and a toll-free international number</span></li>
<li><span style="font-weight: 400;">Record your main message, stating your business name and a customary greeting</span></li>
<li><span style="font-weight: 400;">If you have a team, add extensions for your customer service operations</span></li>
</ul>',
					'tooltip_title' => 'Phone Setup',
					'menu_order' => 15,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:46:02',
					'updated_at' => '2018-05-25 02:56:31',
				),
			15 =>
				array (
					'id' => 16,
					'level_id' => 2,
					'section_id' => 7,
					'parent_id' => NULL,
					'name' => 'Do you need a quick office setup?',
					'slug' => 'do-you-need-a-quick-office-setup',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'QuickOfficeSetUp',
					'element_data' => '{"question_1":"Do you want a prestigious city office address for postage purposes?","question_2":"Do you require a dedicated receptionist only to answer calls on your behalf?","question_3":"Do you require ad hoc team support?"}',
					'tooltip' => '<p><span style="font-weight: 400;">Setting up a productivity suite for your office is essential to create and manage business documents for collaboration. There are freewares such as Libre Office, Quickoffice developed by Google for Android devices. Paid software such as Microsoft Office comes with the subscription model Office 365. Online, you can use free G suite (Google Docs, Sheets and Slides). A few tips:</span></p>
<ul>
<li><strong>Document backups</strong><span style="font-weight: 400;">: Making sure you have secondary copy of important documents and making them accessible even when you are out of office is key</span></li>
<li><strong>Security</strong><span style="font-weight: 400;">: Boost your network security using firewall, VPN and antivitus software and install good policies to protect your data</span></li>
<li><strong>Cloud</strong><span style="font-weight: 400;">: Being able to access your documents online and on any device gives you productivity anytime, anywhere</span></li>
</ul>',
					'tooltip_title' => 'Quick Office',
					'menu_order' => 16,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:46:02',
					'updated_at' => '2018-05-29 10:41:24',
				),
			16 =>
				array (
					'id' => 17,
					'level_id' => 2,
					'section_id' => 7,
					'parent_id' => NULL,
					'name' => 'Have you set up your internet?',
					'slug' => 'have-you-set-up-your-internet',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'SetUpInternet',
					'element_data' => NULL,
					'tooltip' => '<p><span style="font-weight: 400;">The Internet is one of the main technology solutions that small-business owners rely on to do their work and handle emails for communications. Setting up your Internet connection at your office is usually coupled with a good mobile connection as well to make sure you can process your work wherever you go. A few tips:</span></p>
<ul>
<li><strong>Network security</strong><span style="font-weight: 400;">: While some would prefer using free wifi at coffee shops, it is essential to process sensitive business data using your own connection to avoid breach and ensure data protection.</span></li>
<li><strong>Cloud-based apps</strong><span style="font-weight: 400;">: Cloud based solutions and apps for subscription offer both flexibility and function, and are often accessible on your tablets and mobile</span></li>
<li><strong>Operations without internet</strong><span style="font-weight: 400;">: Run tests to help ensure your business can operate even without the Internet</span></li>
</ul>',
					'tooltip_title' => 'Business Internet',
					'menu_order' => 17,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:57:34',
					'updated_at' => '2018-05-25 02:59:00',
				),
			17 =>
				array (
					'id' => 18,
					'level_id' => 2,
					'section_id' => 7,
					'parent_id' => NULL,
					'name' => 'Do you have office accessories',
					'slug' => 'do-you-have-office-accessories',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'OfficeAccessories',
					'element_data' => NULL,
					'tooltip' => '<p><span style="font-weight: 400;">Enabling your team to work comfortably and stay organised in your office is essential to boost your staff morale and productivity. While considered as accessories, this simple equipment list includes the essential to make sure your communications and business documents are handled efficiently and securely. Here are some essential accessories to help you your team run the business smoothly:</span></p>
<ul>
<li><span style="font-weight: 400;">Get some noise cancelling headphones to remove any distractions and stay focussed. &nbsp;This is especially true if working from home or in a shared office space.</span></li>
<li><span style="font-weight: 400;">Stay organised, plan from the outset to keep organised, it&rsquo;s easy to maintain but hard to back track. &nbsp;Folio&rsquo;s, clear tabs and markings will make your life a lot easier later - get into the habit now! </span></li>
<li><span style="font-weight: 400;">This includes your computer, keep files organised, here is a great article to take you through it, step by step: </span><a href="http://www.asianefficiency.com/organization/organizing-files-folders-documents/"><span style="font-weight: 400;">http://www.asianefficiency.com/organization/organizing-files-folders-documents/</span></a></li>
<li><span style="font-weight: 400;">Project management software like Asana, is free, and makes keeping projects on track easier. &nbsp;At the end of the day you still need to do the work!</span></li>
</ul>',
					'tooltip_title' => 'Office Accessories',
					'menu_order' => 18,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:57:34',
					'updated_at' => '2018-05-25 02:59:49',
				),
			18 =>
				array (
					'id' => 19,
					'level_id' => 2,
					'section_id' => 7,
					'parent_id' => NULL,
					'name' => 'Join a business community',
					'slug' => 'join-a-business-community',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'JoinBusinessCommunity',
					'element_data' => NULL,
					'tooltip' => '<p>Joining a business community allows you to bounce ideas off others, and learn from the mistakes and experiences of those that have gone through it all.  Have you considered joining one today?</p>',
					'tooltip_title' => 'Join a business community',
					'menu_order' => 19,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 01:57:34',
					'updated_at' => '2018-05-25 02:59:49',
				),
			19 =>
				array (
					'id' => 20,
					'level_id' => 3,
					'section_id' => 8,
					'parent_id' => NULL,
					'name' => 'SWOT?',
					'slug' => 'swot',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'SWOT',
					'element_data' => NULL,
					'tooltip' => '<p>SWOT</p>',
					'tooltip_title' => '',
					'menu_order' => 20,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2017-11-23 02:04:19',
					'updated_at' => '2018-01-24 09:08:34',
				),
			20 =>
				array (
					'id' => 21,
					'level_id' => 3,
					'section_id' => 8,
					'parent_id' => NULL,
					'name' => 'Customer Analysis?',
					'slug' => 'customer-analysis',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'CustomerAnalysis',
					'element_data' => NULL,
					'tooltip' => '<p>Customer Analysis?</p>',
					'tooltip_title' => '',
					'menu_order' => 21,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:07:02',
					'updated_at' => '2018-01-24 09:08:29',
				),
			21 =>
				array (
					'id' => 22,
					'level_id' => 3,
					'section_id' => 8,
					'parent_id' => NULL,
					'name' => 'Demographic catchment area?',
					'slug' => 'demographic-catchment-area',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'DemographicArea',
					'element_data' => NULL,
					'tooltip' => '<p>Demographic catchment area</p>',
					'tooltip_title' => '',
					'menu_order' => 22,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:07:02',
					'updated_at' => '2018-01-24 09:08:26',
				),
			22 =>
				array (
					'id' => 23,
					'level_id' => 3,
					'section_id' => 8,
					'parent_id' => NULL,
					'name' => 'Social media execution?',
					'slug' => 'social-media-execution',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'SocialMediaExecution',
					'element_data' => NULL,
					'tooltip' => '<p>Social media execution</p>',
					'tooltip_title' => '',
					'menu_order' => 23,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:07:02',
					'updated_at' => '2018-01-24 09:08:21',
				),
			23 =>
				array (
					'id' => 24,
					'level_id' => 3,
					'section_id' => 8,
					'parent_id' => NULL,
					'name' => 'Budget?',
					'slug' => 'budget',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'Budget',
					'element_data' => NULL,
					'tooltip' => '<p>Budget</p>',
					'tooltip_title' => '',
					'menu_order' => 24,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:07:02',
					'updated_at' => '2018-01-24 09:08:16',
				),
			24 =>
				array (
					'id' => 25,
					'level_id' => 3,
					'section_id' => 9,
					'parent_id' => NULL,
					'name' => 'Have you kept a legal adviser?',
					'slug' => 'have-you-kept-a-legal-adviser',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'LegalAdviser',
					'element_data' => NULL,
					'tooltip' => '<p>Have you kept a legal adviser?</p>',
					'tooltip_title' => '',
					'menu_order' => 25,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:07:02',
					'updated_at' => '2018-01-24 09:07:53',
				),
			25 =>
				array (
					'id' => 26,
					'level_id' => 3,
					'section_id' => 10,
					'parent_id' => NULL,
					'name' => 'Do you have employment contracts already?',
					'slug' => 'do-you-have-employment-contracts-already',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'EmploymentContracts',
					'element_data' => NULL,
					'tooltip' => '<p>A written employment contract is an important legal document, which serves as an agreement between an employer and employee (casual, fixed-term, part-time and full-time). It should provide the legal minimums set under the National Employment Standards (NES) and other applicable registered awards. Some key points to answer:</p>
<p>1. Is the contract in the name of the proper employing entity and filed with the right legal jurisdiction?</p>
<p>2. Is there a probation period and for how long?</p>
<p>3. Are there bonused or incentives and are they intended to be discretionary?</p>
<p>4. If your business pays annualised salaries, is there an effective clause?</p>
<p>5. Is your confidential information sufficiently defined and protected?</p>
<p>6. Does the written contract contain the entire agreement or it has additional related documents?</p>
<p>&nbsp;</p>',
					'tooltip_title' => '',
					'menu_order' => 26,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:03:57',
					'updated_at' => '2018-02-16 03:46:31',
				),
			26 =>
				array (
					'id' => 27,
					'level_id' => 3,
					'section_id' => 10,
					'parent_id' => NULL,
					'name' => 'Award Wages?',
					'slug' => 'award-wages',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'AwardWages',
					'element_data' => NULL,
					'tooltip' => '<p>Awards (modern awards) outline the minimum pay rates and legal conditions of employment for your business. There are 122 industry or occupation awards for Australian workers. The pay guides have minimum pay rates for full-time, part-time and casual employees in an award, including monetary allowances and penalty rates. Take note:</p>
<p>&middot; Calculate minimum wages with Fair Work&rsquo;s Pay Calculator or use the Pay guides.</p>
<p>&middot; A small business can have two different awards based on job classifications. For example, a construction company should follow the Building and Construction Award and Clerks Award schemes for its carpenters and administration staff, respectively.</p>
<p>&middot; Comply with recent policies such as the superannuation guarantee (SG) compliance by employers, whilst calling for more frequent employer payslip reporting</p>
<p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap;">&nbsp;</span></p>',
					'tooltip_title' => '',
					'menu_order' => 27,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:03:57',
					'updated_at' => '2018-02-16 03:47:31',
				),
			27 =>
				array (
					'id' => 28,
					'level_id' => 3,
					'section_id' => 10,
					'parent_id' => NULL,
					'name' => 'Do you have your HR Policy & Workplace Health and Safety in a place?',
					'slug' => 'hr-policy',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'HrPolicy',
					'element_data' => NULL,
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
					'tooltip_title' => '',
					'menu_order' => 28,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:03:57',
					'updated_at' => '2018-02-16 03:48:41',
				),
			28 =>
				array (
					'id' => 29,
					'level_id' => 3,
					'section_id' => 11,
					'parent_id' => NULL,
					'name' => 'Book keeping?',
					'slug' => 'book-keeping',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'BookKeeping',
					'element_data' => NULL,
					'tooltip' => '<p>Book keeping?</p>',
					'tooltip_title' => '',
					'menu_order' => 29,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:03:22',
					'updated_at' => '2018-01-24 09:07:10',
				),
			29 =>
				array (
					'id' => 30,
					'level_id' => 3,
					'section_id' => 11,
					'parent_id' => NULL,
					'name' => 'Cash Flow Forecasting?',
					'slug' => 'cash-flow-forecasting',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'CashFlowForecasting',
					'element_data' => NULL,
					'tooltip' => '<p>Cash Flow Forecasting</p>',
					'tooltip_title' => '',
					'menu_order' => 30,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:03:22',
					'updated_at' => '2018-01-24 09:07:06',
				),
			30 =>
				array (
					'id' => 31,
					'level_id' => 3,
					'section_id' => 12,
					'parent_id' => NULL,
					'name' => 'Office space?',
					'slug' => 'office-space',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'OfficeSpace',
					'element_data' => NULL,
					'tooltip' => '<p>For SMEs, office space costs is undoubtedly the second largest expense next to wages. A few tips to help you make the right decision:</p>
<p>1. Check cheaper alternatives. If renting a physical office is pricey, consider a virtual office or share co-working spaces.</p>
<p>2. Negotiate a lease. If a deal does not suit you, walk away and check another property.</p>
<p>3. Research current market prices. Go online, speak to agents and ask around for prices and incentives in your chosen location.</p>
<p>4. Get a heads of agreement in writing. A Heads of Agreement (aka Commercial Terms) is a short two- to five-page document that lists of all of the key things you want the lease to stipulate. Seek legal advice or commercial advice before you sign the heads of agreement.</p>
<p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap;">&nbsp;</span></p>',
					'tooltip_title' => '',
					'menu_order' => 31,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:05:23',
					'updated_at' => '2018-02-16 03:51:01',
				),
			31 =>
				array (
					'id' => 32,
					'level_id' => 3,
					'section_id' => 12,
					'parent_id' => NULL,
					'name' => 'Store Lease?',
					'slug' => 'store-lease',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'StoreLease',
					'element_data' => NULL,
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
					'tooltip_title' => '',
					'menu_order' => 32,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:05:23',
					'updated_at' => '2018-02-16 04:00:47',
				),
			32 =>
				array (
					'id' => 33,
					'level_id' => 3,
					'section_id' => 12,
					'parent_id' => NULL,
					'name' => 'Do you need a hardware?',
					'slug' => 'do-you-need-a-hardware',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'content' => NULL,
					'element' => 'NeedHardware',
					'element_data' => NULL,
					'tooltip' => '<p>Do you need a hardware?</p>',
					'tooltip_title' => '',
					'menu_order' => 33,
					'weight' => 1,
					'show_everywhere' => 1,
					'created_at' => '2018-01-07 11:05:23',
					'updated_at' => '2018-01-24 09:06:49',
				),
		));


	}
}