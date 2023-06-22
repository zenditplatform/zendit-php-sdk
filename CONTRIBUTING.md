# Contributing to `zendit-php`

Welcome to the contribution guidelines for `zendit-php`! We're thrilled that you're interested in helping us make our product even better. To ensure a smooth and productive experience for everyone, we ask that you follow these guidelines:

- [Code of Conduct](#code-of-conduct)
- [Question or Problem?](#got-an-apiproduct-question-or-problem)
- [Issues and Bugs](#found-an-issue)
- [Feature Requests](#want-a-feature)
- [Documentation fixes](#want-a-documentation-fix)
- [Submission Guidelines](#submission-guidelines)
- [Coding Rules](#coding-rules)


## Code of Conduct

We value inclusivity and respect in our community.
Please treat others with kindness and consideration as we work towards a common goal of improving `zendit-php`.

## Got an API/Product Question or Problem?

If you have a question about using `zendit-php`, please check out our [documentation][docs-link].
If you can't find the answer there, feel free to reach out to our [support team][support-page].

## Found an Issue?

If you find a bug in the source code or a mistake in the documentation, you can help us by submitting [an issue][issue-link].

**Please see the [Submission Guidelines](#submit) below.**

## Want a Feature?

If you have a feature request, we'd love to hear it! Please [submit an issue][issue-link] detailing your request and how it would improve `zendit-php`.

## Want a Documentation Fix?

If you notice an error or an area in our documentation that could be improved, please let us know by [submitting an issue][issue-link].

## Submission Guidelines

### Submission guidelines

When submitting code changes, please follow these guidelines:

* Fork the repository and create a new branch for your changes
* Ensure that your code adheres to our coding rules
* Include tests to verify your changes
* Submit a pull request with a clear and descriptive title

We'll review your changes as soon as possible and provide feedback if necessary. Thank you for helping make `zendit-php` the best it can be!

### Coding rules
To ensure consistency and maintainability in our codebase, please follow these coding rules:

* Follow the existing code style.
* Include PHPDoc comments for all functions, variables, and types
* Include unit tests for all new code

Thank you for your contributions to `zendit-php`!

#### After your pull request is merged

After your pull request is merged, you can safely delete your branch and pull the changes from the main (upstream) repository.

## Coding Rules

To ensure consistency throughout the source code, keep these rules in mind as you are working:

- All features or bug fixes **must be tested** by one or more tests.

To run the tests, use the following commands:

```bash
composer install
vendor/bin/phpunit
```
* All classes and methods **must be documented**.

[docs-link]: https://developers.zendit.io/api
[issue-link]: https://github.com/zenditplatform/zendit-php-sdk/issues/new
[github]: https://github.com/zenditplatform/zendit-php-sdk
[support-page]: https://developers.zendit.io/contact/