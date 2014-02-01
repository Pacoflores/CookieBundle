#ConWeb.pl Cookie Bundle

This bundle provides a simple cookie statement layer with customizable template.



## Installation

Installing this bundle can be done through these simple steps:

1. Add the bundle to your project as a composer dependency:
```javascript
// composer.json
{
    // ...
    require: {
        // ...
        "gfilipiak/cookie-bundle": "dev-master"
    }
}
```

2. Update your composer installation:
```shell
composer update
````

3. Add the bundle to your application kernel:
```php
// application/ApplicationKernel.php
public function registerBundles()
{
	// ...
	$bundle = array(
		// ...
        new ConWeb\Bundle\CookieBundle\CookieBundle(),
	);
    // ...

    return $bundles;
}
```

4. Add routing import to your routing.yml
```yml
cookie:
    resource: "@CookieBundle/Resources/config/routing.xml"
    prefix:   /
```

## Customization
You can change the default statement template by placing configuration parameters in your config.yml file:
```yml
cookie:
        template: AcmeBundle:Cookie:statement.html.twig
```
Template should have fallowing structure:
```twig
{% if not accepted %}
    {% stylesheets '@CookieBundle/Resources/public/less/style.less' %}
    <link rel="stylesheet" href="{{ asset_url }}">
    {% endstylesheets %}

    <section class="cookie">
        Your statement here.

     <section class="agree-button">
                <button id="cookieAgree" class="btn-success btn-small" data-ajax-url="{{ path('cookie_accept') }}">
                    Akceptuję
                </button>
            </section>
        </section>
        {% javascripts '@CookieBundle/Resources/public/js/script.js' %}
        <script type="text/javascript" src="{{ asset_url }}"></script>
        {% endjavascripts %}
    {% endif %}
```

TODO: 
- customize only the stamement text not the whole template
- customize less path
