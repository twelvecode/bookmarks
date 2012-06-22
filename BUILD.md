# Building Bookmakrs

This file contains instructions covering the build process of the application.

## Before you start

Bookmarks makes extensive use of `Phing`, both for its own intstallation
/ configuration / packaging, and using Propel ORM.

### Installing Phing

Some tips

### Using phing

Some tips

## The `build/` directory

The `build/` directory contains all the files used in the build process. Some
of them are used for Propel configuration.

* `schema.xml` contains the DB schema definition and some Propel configuration
  used for generating the base classes

* `runtime-conf.template.xml` contains Propel configuration template filled
  with proper values from the `build.properties` fle guring execution of the
  `propel` target

## Target reference

Describes available targets
