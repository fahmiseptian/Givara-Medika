<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $term = '<h3>Limitations Of Liability</h3>
        <p>Sync also automatically collects and receives certain information from your computer or
            mobile device, including the activities you perform on our Website, the Platforms, and the
            Applications, the type of hardware and software you are using (for example, your operating
            system or browser), and information obtained from cookies. For example, each time you visit
            the Website or otherwise use the Services, we automatically collect your IP address, browser
            and device type, access times, the web page from which you came, the regions from which you
            navigate the web page, and the web page(s) you access.</p>
        <p>When you first register for a Sync account, and when you use the we collect some <a
                href="#your-link">Personal Information</a> about you such as:</p>
        <ul class="list-unstyled li-space-lg">
            <li class="media">
                <i class="fas fa-square"></i>
                <div class="media-body">The geographic area where you use your computer and mobile
                    devices should be the same with the one on the receipt</div>
            </li>
            <li class="media">
                <i class="fas fa-square"></i>
                <div class="media-body">Your full name, username, and email address and other contact
                    details must be provided using the dedicated form</div>
            </li>
            <li class="media">
                <i class="fas fa-square"></i>
                <div class="media-body">A unique Sync user ID (an alphanumeric string) which is assigned
                    to you upon registration and session</div>
            </li>
            <li class="media">
                <i class="fas fa-square"></i>
                <div class="media-body">Other optional information as part of your account profile are
                    not required and you should not mention them</div>
            </li>
            <li class="media">
                <i class="fas fa-square"></i>
                <div class="media-body">Your IP Address and, when applicable, timestamp related to your
                    consent and confirmation of consent are mandatory</div>
            </li>
            <li class="media">
                <i class="fas fa-square"></i>
                <div class="media-body">Other information submitted by you or your organizational
                    representatives via various methods is not taken into</div>
            </li>
        </ul>
        <br />
        <h3>Terms And Conditions</h3>
        <p>Under no circumstances shall Sync be liable for any direct, indirect, special, incidental or
            consequential damages, including, but not limited to, loss of data or profit, arising out of
            the use, or the inability to use, the materials on this site, even if Sync or an authorized
            representative has been advised of the possibility of such damages. If your use of materials
            from this site results in the need for servicing, repair or correction of equipment or data,
            you assume any costs thereof should only be provided by the user of the application.</p>
        <br />
        <h3>License Types & Template Usage</h3>
        <p>All our templates inherit the GNU general public license from HTML. All .PSD & CSS files are
            packaged separately and are not licensed under the GPL 2.0. Instead, these files inherit
            Sync Personal Use License. These files are given to all Clients on a personal use basis. You
            may not offer them, <a href="#your-link">modified or unmodified</a>, for redistribution or
            resale of any kind. You can’t use one of our themes on a HTML domain. More on HTML Vs CSS,
            you can read here. You can use our templates do develop sites for your clients and also for
            a limited amount.</p>
        <p>Services help our customers promote their products and services, marketing and advertising;
            engaging audiences; scheduling and publishing messages; and analyze the results are always
            measured better with a dedicated analytics tool.</p>
        <br />
        <h3>Designer Membership And How It Applies</h3>
        <p>By using any of the Services, or submitting or collecting any Personal Information via the
            Services, you consent to the collection, transfer, storage disclosure, and use of your
            Personal Information in the manner set out in this Privacy Policy. If you do not consent to
            the use of your Personal Information in these ways, please stop using the Services if you
            don' . "'" . 't whish to customize the template for your project.</p>
        <br />
        <h3>Assets Used In The Live Preview Content</h3>
        <p>Sync Landing Page uses tracking technology on the landing page, in the Applications, and in
            the Platforms, including mobile application identifiers and a unique Hootsuite user ID to
            help us recognize you across different Services, to monitor usage and web traffic routing
            for the Services, and to customize and improve the Services. By visiting Sync or using the
            Services you agree to the use of cookies in your browser and HTML-based emails. Cookies are
            small text files placed on your device when you visit a <a href="#your-link">web site</a> in
            order to track use of the site and to improve your user experience.</p>';
        $privacy = '
        <h3>Private Data We Receive And Collect</h3>
        <p>Sync also automatically collects and receives certain information from your computer or
            mobile device, including the activities you perform on our Website, the Platforms, and the
            Applications, the type of hardware and software you are using (for example, your operating
            system or browser), and information obtained from cookies. For example, each time you visit
            the Website or otherwise use the Services, we automatically collect your IP address, browser
            and device type, access times, the web page from which you came, the regions from which you
            navigate the web page, and the web page(s) you access (as applicable). There is more to this
            section and we want.</p>
        <p>When you first register for a Sync account, and when you use the Services, we collect some <a
                href="#your-link">Personal Information</a> about you such as:</p>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">The geographic area where you use your computer and
                            other mobile devices should be the same one software provider</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Your full name, username, and email address and other
                            contact details should be provided in the contact forms</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">A unique Sync user ID (an alphanumeric string) which is
                            assigned to you upon registration should always be at front</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Every system is backuped regularly and it will not fail
                        </div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Your IP Address and, when applicable, timestamp related
                            to your consent and confirmation of consent but please make</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Other information submitted by you or your
                            organizational representatives via various methods and practiced techniques
                        </div>
                    </li>
                </ul>
            </div> <!-- end of col -->

            <div class="col-md-6">
                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Your billing address and any necessary other
                            information to complete any financial transaction, and when making purchases
                            through the Services, we may also collect your credit card or PayPal
                            information or any other sensitive data</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">User generated content (such as messages, posts,
                            comments, pages, profiles, images, feeds or communications exchanged on the
                            Supported Platforms that can be used)</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Images or other files that you may publish via our
                            Services</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Information (such as messages, posts, comments, pages,
                            profiles, images) we may receive relating to communications you send us,
                            such as queries or comments concerning</div>
                    </li>
                </ul>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <br />
        <h3>How We Use Sync Landing Page Data</h3>
        <p>Sync Landing Page Template uses visitors data for the following general purposes and for
            other specific ones that are important:</p>
        <ol class="li-space-lg">
            <li>To identify you when you login to your account so we can start or user security process
                for the entire session and duration</li>
            <li>To enable us to operate the Services and provide them to you without fear of losing
                precious confidential information of your users</li>
            <li>To verify your transactions and for purchase confirmation, billing, security, and
                authentication (including security tokens for communication with installed). Always take
                security measures like not saving passwords in your browser or writing them down</li>
            <li>To analyze the Website or the other Services and information about our visitors and
                users, including research into our user demographics and user behaviour in order to
                improve our content and Services</li>
            <li>To contact you about your account and provide customer service support, including
                responding to your comments and questions</li>
            <li>To share aggregate (non-identifiable) statistics about users of the Services to
                prospective advertisers and partners</li>
            <li>To keep you informed about the Services, features, surveys, newsletters, offers,
                surveys, newsletters, offers, contests and events we think you may find useful or which
                you have requested from us</li>
            <li>To sell or market Sync Landing Page products and services to you or in other parts of
                the world where legislation is less restrictive</li>
            <li>To better understand your needs and the needs of users in the aggregate, diagnose
                problems, analyze trends, improve the features and usability of the Services, and better
                understand and market to our customers and users</li>
            <li>To keep the Services safe and secure for everyone using the app from administrators to
                regular users with limited rights</li>
            <li>We also use non-identifiable information gathered for statistical purposes to keep track
                of the number of visits to the Services with a view to introducing improvements and
                improving usability of the Services. We may share this type of statistical data so that
                our partners also understand how often people use the Services, so that they, too, may
                provide you with an optimal experience.</li>
        </ol>
        <br />
        <h3>Customer Content We Process For Customers</h3>
        <p>Sync is a HTML landing page template tool. By its nature, Services enable our customers to
            promote their products and services integrate with hundreds of business applications that
            they already use, all in one place. Customer security is our primary focus in this document.
        </p>
        <p>Services help our customers promote their products and services, marketing and advertising;
            engaging audiences; scheduling and publishing messages; and analyze the results and improve
            the security levels in all areas of the application.</p>
        <br />
        <h3>Consent Of Using Sync Landing Page</h3>
        <p>By using any of the Services, or submitting or collecting any Personal Information via the
            Services, you consent to the collection, transfer, storage disclosure, and use of your
            Personal Information in the manner set out in this Privacy Policy. If you do not consent to
            the use of your Personal Information in these ways, please stop using the Services should be
            safe and easy to guarantee a great user experience.</p>';
        $setting = \App\Models\Setting::create([
            'store_name' => 'SMS Review',
            'slogan' => 'Send message to all with 1 click',
            'bio' => 'Easily send review requests via text message from your dashboard. A special link will be sent to your customers so they can leave a review on your designated website.',
            'address' => 'Jl. Raya No. 1, Jakarta, Indonesia',
            'email' => 'office@smsreview.id',
            'phone_number' => '+6288888888888',
            'wa_number' => '+6288888888888',
            'term_and_condition' => $term,
            'privacy_policy' => $privacy,
            'link_playstore' => "https://google.com",
            'link_appstore' => "https://apple.com",
            'link_fb' => "https://apple.com",
            'link_twitter' => "https://apple.com",
            'link_ig' => "https://apple.com"
        ]);
    }
}
