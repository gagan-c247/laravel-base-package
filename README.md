# Installation Instructions

<div style="font-family: Arial, sans-serif; line-height: 1.6;">

<h2>Installation Steps</h2>

<ol>
  <li>
    Require the package using Composer:
    <pre><code>composer require c247/codebank-test</code></pre>
  </li>
  <li>
    Run the installation command to set up the package:
    <pre><code>php artisan codebank:install</code></pre>
  </li>
  <li>
    Implement <code>c247\codebank\Contracts\UserContract</code> in your User model and use the <code>c247\codebank\Traits\UserTrait</code>:
    <pre><code>
use c247\codebank\Contracts\UserContract;
use c247\codebank\Traits\UserTrait;

class User extends Authenticatable implements UserContract
{
    use UserTrait;
    // Your model code
}
</code></pre>
  </li>
  <li>
    Run the database seeder to set necessary permissions for the admin user:
    <pre><code>php artisan db:seed --class=AdminAndPermissionSeeder</code></pre>
  </li>
  <li>
    The default admin user credentials are:
    <ul>
      <li><strong>Email:</strong> admin@codebank.com</li>
      <li><strong>Password:</strong> Codebank@123</li>
    </ul>
  </li>
</ol>

<p>Once these steps are complete, the package will be installed and ready to use.</p>

</div>
