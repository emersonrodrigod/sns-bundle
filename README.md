# Solpac Symfony SNS Bundle
A simple Symfony bundle for AWS SNS

## Setup

### Step 1: Download SnsBundle using composer

``` bash
composer require solpac/SnsBundle
```


### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Solpac\SNSBundle\SolpacSNSBundle()
    );
}
```

### Step 3: Add configuration

``` yml
# app/config/config.yml
solpac_sns:
        amazon_sns:
            amazon_sns_key:    %amazon_sns_key%
            amazon_sns_secret: %amazon_sns_secret%
            amazon_sns_region: %amazon_sns_region%
```

## Usage

**Using service**

``` php
<?php
        $snsClient = $this->get('amazon_sns_client');
?>
```
