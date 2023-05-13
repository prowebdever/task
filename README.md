# Introduction

You are working on a sophisticated archiving application. The application chooses the compression algorithm based on a given file. 

# Problem statement

Your task is to: 

* Configure services in the `config\services.yaml`.
* Inject archive providers to the main service.
* Choose the best archive provider for a given file.


using [Symfony](https://symfony.com/).

To complete the task you should:

* Mark providers in the `config\services.yaml` with proper tags.
* Implement the `process()` method in the `ArchiverCompilerPass` class to inject providers during kernel compilation using [Symfony's CompilerPassInterface](https://symfony.com/doc/current/components/dependency_injection/compilation.html#components-di-separate-compiler-passes).
  Make sure both providers `RarArchiver` and `ZipArchiver` are injected by setting the appropriate tag!
* There are two providers: `RarArchiver` and `ZipArchiver`. They have configured `SupportedFile` value objects. An instance of the `SupportedFile` consists of a file extension and a compression rate (which is used to determine which archiver is the best for a given extension).
* Implement the `getBestArchiver()` method in the `Service\ArchiverService` to choose the best archive provider based on the file extension and compression rate.
* Change only the methods or yaml files marked with `@todo` annotation.


# Input structure

## Operations

Tests will be checking different kinds of filenames to choose the best archiver.

# Hints

Think about invalid inputs that can be passed and handle them by throwing `InvalidArchiverException`. This example doesn’t do any compression, it only invokes the method that could possibly use a real external archiver.