<div id="top"></div>
<br />
<div align="center">
  <a href="https://github.com/diverso-lab/webspl">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">WebSPL</h3>

  <p align="center">
    An awesome README template to jumpstart your projects!
    <br />
    <a href="https://github.com/diverso-lab/webspl/wiki"><strong>Explore the Wiki »</strong></a>
    <br />
    <br />
    <a href="https://github.com/diverso-lab/webspl/issues">Report Bug</a>
    ·
    <a href="https://github.com/diverso-lab/webspl/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#contributing">Contributing</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

WebSPL provides an interface for website modeling through different technologies. The main goal is to prove the utility of Features Model and Configurability as an automatic website builder and validator tool.

Workflow explained:
* User logs-in the website, creating a new user.
* Navigates to the configurator, and start selecting the features needed + providing some more information (web name, email...)
* Once the user has finished the selection, hit enter and wait. 
* Now, the website is being tested with [FLAMA](https://github.com/diverso-lab/core), which is an automated tool for feature model analysis.
* Once everything is ready, the website gets created through Docker, installs all the needed features and gets automatically deployed in the localhost.

There are a few known bugs that we acknowledge, described in the projects section. If you detect any other new bug, please consider reporting it!

<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

This section should list any major frameworks/libraries used to bootstrap your project. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.

* [Laravel](https://laravel.com)
* [MySQL](https://www.mysql.com/)
* [FLAMA](https://github.com/diverso-lab/core)
* [Docker](https://www.docker.com/)
* [WordPress](https://wordpress.org)
* [WP CLI](https://wp-cli.org/es/)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

You will need Docker, Composer and Python (>=3.9) for the project to work.

To get a local copy up and running follow these simple example steps.

### Instalation

1. Clone the repository

2. Install the python requisites:
  ```sh
  pip install -r requirements.txt
  ```
3. Install composer dependencies:
  ```sh
  composer install
  ```
4. Update the .env file providing the HOME_PATH and the DB connection

5. Migrate the DB
  ```sh
  php artisan migrate:fresh
  ```
6. Run the app:
  ```sh
  php artisan serve
  ```

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".

Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>

[contributors-url]: https://github.com/diverso-lab/webspl/graphs/contributors
[forks-url]: https://github.com/diverso-lab/webspl/network/members
[stars-url]: https://github.com/diverso-lab/webspl/stargazers
[issues-url]: https://github.com/diverso-lab/webspl/issues

