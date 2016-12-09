# Page Component for Laflux

Laflux is a Hybrid Platform built with Laravel 5.3. This is the page component for Laflux.

## Getting Started

Page component is used for managing web pages, including ther URL, etc.It also includes a CRUD option to View, Add, Edit, Publish/Unpublish, Trash pages. You can create as many as page categories. [Demo](http://demo.laflux.com/admin/dashboard). Default Username : demo@laflux.com, Password : 123456.

### Prerequisites

Laflux platform : http://www.github.com/LaFlux/LaFlux. Checkout the demo of Laflux: Front end(http://demo.laflux.com/), Back end(http://demo.laflux.com/admin/dashboard)

### Installing

The default Laflux platform includes all the necessary packages including this one. This component has been added as a submodule in the Laflux.However, you can install this component separately via two methods.

1.) Download the component as zip and upload directly into the system via Laflux Extension manager component.

2.) Manual Installation (Via git clone)

Clone the repository in to the Directory, root directory/packages/ExtensionsValley/ . After cloning, run the following commands.

```
php artisan vendor:publish 
php artisan migrate
composer dumpautoload -o
```

## Deployment

This component is completely ready for deployment. Installation is all you have to do.

## Built With

* [LARAVEL](https://laravel.com/) - The web framework used
* [COMPOSER](https://getcomposer.org/) - Dependency Management

## Authors

* **Jobin Jose** - *Initial work* - [Jobin Jose](https://github.com/Jobinjose01)
* **Jinto Antony** - *Initial work* - [Jinto Antony](https://github.com/JintoAntony)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Laflux platform Documentation - [Documentation](http://docs.laflux.com/)
* Updates - Pull this repository for latest updates
* Premium Version of Laflux - [Premium Version](http://extensionsvalley.com/downloads/laravel-admin-dashboard/)


