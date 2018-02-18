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
                'content' => '<p>Select the best fit below. Don\'t worry you can always change your selection later.</p>',
                'element' => 'BusinessCategories',
                'tooltip' => '<p>What industry is your business idea in?</p>',
                'menu_order' => 1,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-01-24 09:11:02',
            ),
            1 => 
            array (
                'id' => 2,
                'level_id' => 1,
                'section_id' => 1,
                'parent_id' => NULL,
                'name' => 'Will you also be selling goods online?',
                'slug' => 'will-you-also-be-selling-goods-online',
                'content' => NULL,
                'element' => 'SellGoods',
                'tooltip' => '<p>Will you also be selling goods online?</p>',
                'menu_order' => 2,
                'weight' => 1,
                'show_everywhere' => 0,
                'created_at' => '2018-01-07 10:43:38',
                'updated_at' => '2018-01-24 09:10:57',
            ),
            2 => 
            array (
                'id' => 3,
                'level_id' => 1,
                'section_id' => 2,
                'parent_id' => NULL,
                'name' => 'Great Now lets create your account',
                'slug' => 'great-now-lets-create-your-account',
                'content' => NULL,
                'element' => 'RegisterUser',
                'tooltip' => '<p>Great Now lets create your account</p>',
                'menu_order' => 3,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:28:17',
                'updated_at' => '2018-01-24 09:10:52',
            ),
            3 => 
            array (
                'id' => 4,
                'level_id' => 1,
                'section_id' => 3,
                'parent_id' => NULL,
                'name' => 'So tell us about your business',
                'slug' => 'so-tell-us-about-your-business',
                'content' => NULL,
                'element' => 'CreateBusiness',
                'tooltip' => '<p>So tell us about your business</p>',
                'menu_order' => 4,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:29:09',
                'updated_at' => '2018-01-24 09:10:47',
            ),
            4 => 
            array (
                'id' => 5,
                'level_id' => 1,
                'section_id' => 4,
                'parent_id' => NULL,
                'name' => 'Register Your Business',
                'slug' => 'register-your-business',
                'content' => NULL,
                'element' => 'RegisterBusiness',
                'tooltip' => '<p>Register Your Business</p>',
                'menu_order' => 5,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:30:17',
                'updated_at' => '2018-01-24 09:10:43',
            ),
            5 => 
            array (
                'id' => 6,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Do you have a logo?',
                'slug' => 'do-you-have-a-logo',
                'content' => NULL,
                'element' => 'Logo',
                'tooltip' => '<p>Do you have a logo</p>',
                'menu_order' => 6,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:49:28',
                'updated_at' => '2018-02-15 23:17:37',
            ),
            6 => 
            array (
                'id' => 7,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Enter your tagline or create one now',
                'slug' => 'enter-your-tagline-or-create-one-now',
                'content' => NULL,
                'element' => 'Tagline',
                'tooltip' => '<p>Small businesses need a strong brand name to set themselves apart from competitors. Any name, whether it is abstract or informative, can be effective if backed by an appropriate marketing strategy. A few tips: &middot;</p>
<p>Your name is simple, unique and conveys your brand personality.</p>
<p>It has an available domain name for your web presence and online business.</p>
<p>Your name is not confusing (not misunderstood).</p>
<p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap;">&nbsp;</span></p>',
                'menu_order' => 7,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:49:28',
                'updated_at' => '2018-02-16 03:08:28',
            ),
            7 => 
            array (
                'id' => 8,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Select Your Brand Colour',
                'slug' => 'select-your-brand-color',
                'content' => NULL,
                'element' => 'BrandColor',
                'tooltip' => '<p>Understanding the psychology on how to use colour in terms of connecting to your customers can increase the effectiveness and success of your branding efforts. Your business colour helps set up the overall theme and personality of your business brand. Different colours have different emotional connotations to people. And this is where you can reinforce the meaning of your brand and its affinity with your customers. For example, your target clients are upper middle-class women, which dictates that your market is that of prestige and exclusivity and the personality you want to adopt is a sophisticated brand. Then, you pick a colour that reflects this. Some basic colour meanings:</p>
<p>&middot; Red &ndash; triggers powerful emotion like power, passion and caution</p>
<p>&middot; Orange &ndash; generates a vibe of warmth, confidence and adventure</p>
<p>&middot; Yellow &ndash; indicates youth, happiness and fun</p>
<p>&middot; Green &ndash; conveys growth, health and prosperity</p>
<p>&middot; Blue &ndash; represents calmness, strength and wisdom</p>
<p>&nbsp;</p>',
                'menu_order' => 8,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:51:54',
                'updated_at' => '2018-02-16 03:31:18',
            ),
            8 => 
            array (
                'id' => 9,
                'level_id' => 2,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Social Media Registration',
                'slug' => 'social-media-registration',
                'content' => NULL,
                'element' => 'SocialMediaRegistration',
                'tooltip' => '<p>Using social media to boost your marketing and eventually, your sales strategy relies on understanding how to better serve your customers. Social media marketing allows you to reinforce your brand value and proposition while promoting constant connections with your customers.</p>
<p>To start your social media marketing journey, it pays to know the following:</p>
<p>&middot;&nbsp;Ready your information for registration: Have an email for registration and a list of your business name, website or physical location and contact number.</p>
<p>&middot;&nbsp;Identify channels to use: Listen to your audience to better identify what social media channels they use.</p>
<p>&middot;&nbsp;Define your content strategy: Create a social media handle and hashtag unique to your brand and incorporate SEO keywords.</p>',
                'menu_order' => 9,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:52:43',
                'updated_at' => '2018-02-16 04:20:04',
            ),
            9 => 
            array (
                'id' => 10,
                'level_id' => 2,
                'section_id' => 6,
                'parent_id' => NULL,
                'name' => 'Financing Option?',
                'slug' => 'financing-option',
                'content' => NULL,
                'element' => 'FinancingOption',
                'tooltip' => '<p>While most small businesses have no standard capital required, drawing a plan on how to secure new capital for growth is vital. List down your options on where to get money to increase your initial capital and meet your budget needs.</p>
<p>&middot; Bootstrapping: Many successful entrepreneurs launch start-ups with little capital, using their own savings &middot; Family and friends: You can also ask for help for additional capital but be sure to pay them based on the agreed schedule</p>
<p>&middot; Bank loans: Ask for short-, mid- or long-term financing but make sure you can cover the interest rates and return the principal amount borrowed</p>
<p>&middot; Venture capital and angel investors: This is an option if your business has a good cashflow history and bankable reputation</p>
<p>&middot; Government loans: Check their offerings and compare payment rates</p>
<p>&nbsp;</p>',
                'menu_order' => 10,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:55:03',
                'updated_at' => '2018-02-16 03:32:21',
            ),
            10 => 
            array (
                'id' => 11,
                'level_id' => 2,
                'section_id' => 6,
                'parent_id' => NULL,
                'name' => 'Initial accounting software?',
                'slug' => 'initial-account-software',
                'content' => NULL,
                'element' => 'InitialAccountSoftware',
                'tooltip' => '<p>Bookkeeping is a much-needed function in managing your finance. Offerings from Xero, Intuit and Netsuite, among others, offer SMEs many options on how to manage their invoices, expenses, payroll, taxes and inventory. Online accounting platforms offer you a cheaper option than when hiring an accountant during the initial stage of your business. Here are a few things to look for:</p>
<p>&middot; Simple interface: Cloud-based applications at the minimum should offer sensible navigation and data entry forms</p>
<p>&middot; Subscription model: Pay-as-you-go model makes online solutions cheaper, and help manage cash-flow.</p>
<p>&middot; Mobile version: Get software that lets you access your financial data on your smartphone or tablet</p>
<p>&middot; Regular reporting: Make sure to sign up for PAYG options for your taxation payments &middot; Quality user support: Review the after-sales support and 24/7 customer service</p>
<p>&nbsp;</p>',
                'menu_order' => 11,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:55:03',
                'updated_at' => '2018-02-16 03:32:38',
            ),
            11 => 
            array (
                'id' => 12,
                'level_id' => 2,
                'section_id' => 6,
                'parent_id' => NULL,
                'name' => 'Business Banking?',
                'slug' => 'business-banking',
                'content' => NULL,
                'element' => 'BusinessBanking',
                'tooltip' => '<p>Many Australian banks are focused on helping small-business owners. A business bank account can help you track your expenses, invoices, and credit line. It can be used for transaction, savings and business term deposit. In Australia, you will need your Australia Company Number and registration with the Australian Security Investments Commission. A few tips to get the best deal:</p>
<p>&middot; Fees: Negotiate the rates for monthly service fees and other charges</p>
<p>&middot; Interest rates: Look for the best competitive rates and related financial products suited for your account</p>
<p>&middot; Features: Features such as credit line and e-statements can benefit your small business</p>
<p>&middot; Accessibility: Standard features include online banking, telephone banking, debit card and chequebook. Consider if you also need easy access to your business savings</p>
<p>&nbsp;</p>',
                'menu_order' => 12,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:55:03',
                'updated_at' => '2018-02-16 03:32:54',
            ),
            12 => 
            array (
                'id' => 13,
                'level_id' => 2,
                'section_id' => 6,
                'parent_id' => NULL,
                'name' => 'Merchant Facilities?',
                'slug' => 'merchant-facilities',
                'content' => NULL,
                'element' => 'MerchantFacilities',
                'tooltip' => '<p>Merchant facilities including ETFPOS terminals and online payments allow you to receive card credit and debit card payments with relative ease. Be sure to take note of policies such as those that limit the card payment surcharges passed on to customers starting September 2017. Different fees apply, including monthly fees and card reader payments. Things to consider:</p>
<p>&middot; Smart readers: Smart readers include small terminals and those that can attach to your Android or Apple phone to let you process customer payments easily</p>
<p>&middot; Contactless payments: Some POS terminals allow you to swipe or insert a chip card, including extra options for tipping</p>
<p>&middot; Smartphone app: Customers can install their own app to process shopping as they enter your physical store and you can guide them better with your latest product offerings</p>
<p>&nbsp;</p>',
                'menu_order' => 13,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:56:30',
                'updated_at' => '2018-02-16 03:33:34',
            ),
            13 => 
            array (
                'id' => 14,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Have you set up your business email address?',
                'slug' => 'have-you-set-up-your-business-email-address',
                'content' => NULL,
                'element' => 'BusinessEmailSetUp',
                'tooltip' => '<p>Setting up your email is one of the main tasks to help you create, collaborate and communicate professionally with clients, suppliers and your team. Select a provider that offers email features tailoured for small businesses. A few things to consider:</p>
<p>&middot; Free or paid: Free email sign-ups are okay, especially if you are a small start-up; as you grow, setting up a paid email account with your own website domain name makes outgoing communications more professional</p>
<p>&middot; User policies: Make sure the administrator provides the right access and tools for each user type</p>
<p>&middot; Suite of apps: Calendar for tasking schedules, Documents (for working collaboration) and an online Office equivalent are essential to productivity</p>',
                'menu_order' => 14,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:46:02',
                'updated_at' => '2018-02-16 03:34:40',
            ),
            14 => 
            array (
                'id' => 15,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Do you have your phone set up?',
                'slug' => 'do-you-have-your-phone-setup',
                'content' => NULL,
                'element' => 'PhoneSetUp',
                'tooltip' => '<p>Incoming and outgoing calls are part of business communications so setting up a separate line from your personal number helps keep your business transactions in order. Set up your business phone number and consider if you need one or a combination of a regular landline, intercom, wireless and/or cloud-based VoIP phones. A few tips:</p>
<p>&middot; Get a local business number and a toll-free international number</p>
<p>&middot; Record your main message, stating your business name and a customary greeting</p>
<p>&middot; If you have a team, add extensions for your customer service operations</p>
<p>&middot; Receive calls and manage them as you go by setting up a virtual system online</p>
<p>&middot; Add alternative options for Skype and Google Talk to avoid costly international calls</p>
<p>&nbsp;</p>',
                'menu_order' => 15,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:46:02',
                'updated_at' => '2018-02-16 03:35:01',
            ),
            15 => 
            array (
                'id' => 16,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Do you need a quick office setup?',
                'slug' => 'do-you-need-a-quick-office-setup',
                'content' => NULL,
                'element' => 'QuickOfficeSetUp',
                'tooltip' => '<p>Enabling your team to work comfortably and stay organised in your office is essential to boost your staff morale and productivity. While considered as accessories, this simple equipment list includes the essential to make sure your communications and business documents are handled efficiently and securely. Here are some essential accessories to help you your team run the business smoothly: 1. Phone Communications is the lifeline of any business. Consider your calling habits and frequency, the availability of an in-house receptionist or online attendant and if you are opting for VoIP services, check if Internet connection can handle the extra data.</p>
<p>&middot; Landline: A connected phone line is best to handle local calls, with options to receive and make calls to mobile phones and sometimes international numbers</p>
<p>&middot; Smartphone: For most on-the-go members of your team, be sure to check plans that help them stay in touch with your business anytime, anywhere</p>
<p>&middot; Cloud-based phone or VoIP solutions: These can deliver calls and PBX-style functionality over your internet connection, minus the costly equipment</p>
<p>&middot; Chatbots: Essential part of your strategy as more customers communicate via messaging apps 2. Computer Any business that processes information requires at least a computer or two, with options to having a tablet or a smartphone for accessing business emails and apps while on-the-go.</p>
<p>&middot; Decide on your operating system: Most businesses have a choice of running a Microsoft Windows or Apple Mac OS to get the job done</p>
<p>&middot; Desktop or laptop: Check your budget and your requirements for portability; often, laptop is the top choice since a business owner can take their work wherever they need to go while others still prefer having a sturdy desktop that can be cheaper and easier to upgrade</p>
<p>&middot; Check the storage and processing specs: Make sure not to scrimp too much on your computer, especially since it will handle the main bulk of your business documents and communications 3. Printer Setting smart policies for office printing can dramatically reduce inefficiencies, security risks and associated costs. Below are three print management tasks you can consider during setup:</p>
<p>&middot; IT help desk vs print roaming: IT help desks can assist employees but it gets burdensome if there are too many people to service. Print roaming allows you to use any network printer without IT support</p>
<p>&middot; IT administration of multiple solutions: Use scan workflows with pre-defined capture settings, optical character recognition (OCR), file name protocols and automatic, secure digital workflow delivery.</p>
<p>&middot; Mobile print: Users can send a document to a dedicated e-mail address for printing so no print drivers are needed at a user workstation.</p>
<p>&nbsp;</p>',
                'menu_order' => 16,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:46:02',
                'updated_at' => '2018-02-16 03:35:17',
            ),
            16 => 
            array (
                'id' => 17,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Have you set up your internet',
                'slug' => 'have-you-set-up-your-internet',
                'content' => NULL,
                'element' => 'SetUpInternet',
                'tooltip' => '<p>The Internet is one of the main technology solutions that small-business owners rely on to do their work and handle emails for communications. Setting up your Internet connection at your office is usually coupled with a good mobile connection as well to make sure you can process your work wherever you go. A few tips:</p>
<p>&middot; Network security: While some would prefer using free wifi at coffee shops, it is essential to process sensitive business data using your own connection to avoid breach and ensure data protection.</p>
<p>&middot; Cloud-based apps: Cloud based solutions and apps for subscription offer both flexibility and function, and are often accessible on your tablets and mobile</p>
<p>&middot; Operations without internet: Run tests to help ensure your business can operate even without the Internet</p>',
                'menu_order' => 17,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:57:34',
                'updated_at' => '2018-02-16 03:36:32',
            ),
            17 => 
            array (
                'id' => 18,
                'level_id' => 2,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Do you have office accessories',
                'slug' => 'do-you-have-office-accessories',
                'content' => NULL,
                'element' => 'OfficeAccessories',
                'tooltip' => '<p dir="ltr">&nbsp;</p>
<p dir="ltr">Enabling your team to work comfortably and stay organised in your office is essential to boost your staff morale and productivity. While considered as accessories, this simple equipment list includes the essential to make sure your communications and business documents are handled efficiently and securely. Here are some essential accessories to help you your team run the business smoothly:</p>
<p dir="ltr">1. Phone</p>
<p dir="ltr">Communications is the lifeline of any business. Consider your calling habits and frequency, the availability of an in-house receptionist or online attendant and if you are opting for VoIP services, check if Internet connection can handle the extra data.</p>
<p dir="ltr">&middot; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Landline: A connected phone line is best to handle local calls, with options to receive and make calls to mobile phones and sometimes international numbers</p>
<p dir="ltr">&middot; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Smartphone: For most on-the-go members of your team, be sure to check plans that help them stay in touch with your business anytime, anywhere</p>
<p dir="ltr">&middot; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cloud-based phone or VoIP solutions: These can deliver calls and PBX-style functionality over your internet connection, minus the costly equipment</p>
<p dir="ltr">&middot; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chatbots: Essential part of your strategy as more customers communicate via messaging apps</p>
<p dir="ltr">2. Computers</p>
<p dir="ltr">Any business that processes information requires at least a computer or two, with options to having a tablet or a smartphone for accessing business emails and apps while on-the-go.</p>
<p dir="ltr">&middot; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Decide on your operating system: Most businesses have a choice of running a Microsoft Windows or Apple Mac OS to get the job done</p>
<p dir="ltr">&middot; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Desktop or laptop: Check your budget and your requirements for portability; often, laptop is the top choice since a business owner can take their work wherever they need to go while others still prefer having a sturdy desktop that can be cheaper and easier to upgrade</p>
<p dir="ltr">&middot; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Check the storage and processing specs: Make sure not to scrimp too much on your computer, especially since it will handle the main bulk of your business documents and communications</p>
<p dir="ltr">3. Printer&nbsp;</p>
<p dir="ltr">Setting smart policies for office printing can dramatically reduce inefficiencies, security risks and associated costs. Below are three print management tasks you can consider during setup:</p>
<p dir="ltr">&middot; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IT help desk vs print roaming: IT help desks can assist employees but it gets burdensome if there are too many people to service. Print roaming allows you to use any network printer without IT support</p>
<p dir="ltr">&middot; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IT administration of multiple solutions: Use scan workflows with pre-defined capture settings, optical character recognition (OCR), file name protocols and automatic, secure digital workflow delivery.</p>
<p dir="ltr">&middot; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile print: Users can send a document to a dedicated e-mail address for printing so no print drivers are needed at a user workstation.</p>',
                'menu_order' => 18,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:57:34',
                'updated_at' => '2018-02-16 03:43:56',
            ),
            18 => 
            array (
                'id' => 19,
                'level_id' => 3,
                'section_id' => 8,
                'parent_id' => NULL,
                'name' => 'SWOT?',
                'slug' => 'swot',
                'content' => NULL,
                'element' => 'SWOT',
                'tooltip' => '<p>SWOT</p>',
                'menu_order' => 19,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 02:04:19',
                'updated_at' => '2018-01-24 09:08:34',
            ),
            19 => 
            array (
                'id' => 20,
                'level_id' => 3,
                'section_id' => 8,
                'parent_id' => NULL,
                'name' => 'Customer Analysis?',
                'slug' => 'customer-analysis',
                'content' => NULL,
                'element' => 'CustomerAnalysis',
                'tooltip' => '<p>Customer Analysis?</p>',
                'menu_order' => 20,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:07:02',
                'updated_at' => '2018-01-24 09:08:29',
            ),
            20 => 
            array (
                'id' => 21,
                'level_id' => 3,
                'section_id' => 8,
                'parent_id' => NULL,
                'name' => 'Demographic catchment area?',
                'slug' => 'demographic-catchment-area',
                'content' => NULL,
                'element' => 'DemographicArea',
                'tooltip' => '<p>Demographic catchment area</p>',
                'menu_order' => 21,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:07:02',
                'updated_at' => '2018-01-24 09:08:26',
            ),
            21 => 
            array (
                'id' => 22,
                'level_id' => 3,
                'section_id' => 8,
                'parent_id' => NULL,
                'name' => 'Social media execution?',
                'slug' => 'social-media-execution',
                'content' => NULL,
                'element' => 'SocialMediaExecution',
                'tooltip' => '<p>Social media execution</p>',
                'menu_order' => 22,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:07:02',
                'updated_at' => '2018-01-24 09:08:21',
            ),
            22 => 
            array (
                'id' => 23,
                'level_id' => 3,
                'section_id' => 8,
                'parent_id' => NULL,
                'name' => 'Budget?',
                'slug' => 'budget',
                'content' => NULL,
                'element' => 'Budget',
                'tooltip' => '<p>Budget</p>',
                'menu_order' => 23,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:07:02',
                'updated_at' => '2018-01-24 09:08:16',
            ),
            23 => 
            array (
                'id' => 24,
                'level_id' => 3,
                'section_id' => 9,
                'parent_id' => NULL,
                'name' => 'Have you kept a legal adviser?',
                'slug' => 'have-you-kept-a-legal-adviser',
                'content' => NULL,
                'element' => 'LegalAdviser',
                'tooltip' => '<p>Have you kept a legal adviser?</p>',
                'menu_order' => 24,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:07:02',
                'updated_at' => '2018-01-24 09:07:53',
            ),
            24 => 
            array (
                'id' => 25,
                'level_id' => 3,
                'section_id' => 10,
                'parent_id' => NULL,
                'name' => 'Do you have employment contracts already?',
                'slug' => 'do-you-have-employment-contracts-already',
                'content' => NULL,
                'element' => 'EmploymentContracts',
            'tooltip' => '<p>A written employment contract is an important legal document, which serves as an agreement between an employer and employee (casual, fixed-term, part-time and full-time). It should provide the legal minimums set under the National Employment Standards (NES) and other applicable registered awards. Some key points to answer:</p>
<p>1. Is the contract in the name of the proper employing entity and filed with the right legal jurisdiction?</p>
<p>2. Is there a probation period and for how long?</p>
<p>3. Are there bonused or incentives and are they intended to be discretionary?</p>
<p>4. If your business pays annualised salaries, is there an effective clause?</p>
<p>5. Is your confidential information sufficiently defined and protected?</p>
<p>6. Does the written contract contain the entire agreement or it has additional related documents?</p>
<p>&nbsp;</p>',
                'menu_order' => 25,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:03:57',
                'updated_at' => '2018-02-16 03:46:31',
            ),
            25 => 
            array (
                'id' => 26,
                'level_id' => 3,
                'section_id' => 10,
                'parent_id' => NULL,
                'name' => 'Award Wages?',
                'slug' => 'award-wages',
                'content' => NULL,
                'element' => 'AwardWages',
            'tooltip' => '<p>Awards (modern awards) outline the minimum pay rates and legal conditions of employment for your business. There are 122 industry or occupation awards for Australian workers. The pay guides have minimum pay rates for full-time, part-time and casual employees in an award, including monetary allowances and penalty rates. Take note:</p>
<p>&middot; Calculate minimum wages with Fair Work&rsquo;s Pay Calculator or use the Pay guides.</p>
<p>&middot; A small business can have two different awards based on job classifications. For example, a construction company should follow the Building and Construction Award and Clerks Award schemes for its carpenters and administration staff, respectively.</p>
<p>&middot; Comply with recent policies such as the superannuation guarantee (SG) compliance by employers, whilst calling for more frequent employer payslip reporting</p>
<p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap;">&nbsp;</span></p>',
                'menu_order' => 26,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:03:57',
                'updated_at' => '2018-02-16 03:47:31',
            ),
            26 => 
            array (
                'id' => 27,
                'level_id' => 3,
                'section_id' => 10,
                'parent_id' => NULL,
                'name' => 'Do you have your HR Policy & Workplace Health and Safety in a place?',
                'slug' => 'hr-policy',
                'content' => NULL,
                'element' => 'HrPolicy',
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
                'menu_order' => 27,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:03:57',
                'updated_at' => '2018-02-16 03:48:41',
            ),
            27 => 
            array (
                'id' => 28,
                'level_id' => 3,
                'section_id' => 11,
                'parent_id' => NULL,
                'name' => 'Book keeping?',
                'slug' => 'book-keeping',
                'content' => NULL,
                'element' => 'BookKeeping',
                'tooltip' => '<p>Book keeping?</p>',
                'menu_order' => 28,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:03:22',
                'updated_at' => '2018-01-24 09:07:10',
            ),
            28 => 
            array (
                'id' => 29,
                'level_id' => 3,
                'section_id' => 11,
                'parent_id' => NULL,
                'name' => 'Cash Flow Forecasting?',
                'slug' => 'cash-flow-forecasting',
                'content' => NULL,
                'element' => 'CashFlowForecasting',
                'tooltip' => '<p>Cash Flow Forecasting</p>',
                'menu_order' => 29,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:03:22',
                'updated_at' => '2018-01-24 09:07:06',
            ),
            29 => 
            array (
                'id' => 30,
                'level_id' => 3,
                'section_id' => 12,
                'parent_id' => NULL,
                'name' => 'Office space?',
                'slug' => 'office-space',
                'content' => NULL,
                'element' => 'OfficeSpace',
                'tooltip' => '<p>For SMEs, office space costs is undoubtedly the second largest expense next to wages. A few tips to help you make the right decision:</p>
<p>1. Check cheaper alternatives. If renting a physical office is pricey, consider a virtual office or share co-working spaces.</p>
<p>2. Negotiate a lease. If a deal does not suit you, walk away and check another property.</p>
<p>3. Research current market prices. Go online, speak to agents and ask around for prices and incentives in your chosen location.</p>
<p>4. Get a heads of agreement in writing. A Heads of Agreement (aka Commercial Terms) is a short two- to five-page document that lists of all of the key things you want the lease to stipulate. Seek legal advice or commercial advice before you sign the heads of agreement.</p>
<p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap;">&nbsp;</span></p>',
                'menu_order' => 30,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:05:23',
                'updated_at' => '2018-02-16 03:51:01',
            ),
            30 => 
            array (
                'id' => 31,
                'level_id' => 3,
                'section_id' => 12,
                'parent_id' => NULL,
                'name' => 'Store Lease?',
                'slug' => 'store-lease',
                'content' => NULL,
                'element' => 'StoreLease',
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
                'menu_order' => 31,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:05:23',
                'updated_at' => '2018-02-16 04:00:47',
            ),
            31 => 
            array (
                'id' => 32,
                'level_id' => 3,
                'section_id' => 12,
                'parent_id' => NULL,
                'name' => 'Do you need a hardware?',
                'slug' => 'do-you-need-a-hardware',
                'content' => NULL,
                'element' => 'NeedHardware',
                'tooltip' => '<p>Do you need a hardware?</p>',
                'menu_order' => 32,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2018-01-07 11:05:23',
                'updated_at' => '2018-01-24 09:06:49',
            ),
        ));
        
        
    }
}