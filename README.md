# Collection

Minmalistic typed arrays/collections for PHP.

There are many collection libraries for PHP, but none exactly like I wanted. Most collection libraries add quite a lot of extra functionality I'm not looking for.

What collection does:
- Simple & lightweight
- Array syntax
- Allow typehinting for array of objects

### Motivation

Typehinting "array" in PHP is not really descriptive. Sometimes its preferable to use collection-like typed arrays. This library provides common parent to make creating these collections less boilerplatey.

### Install

`composer require silvanus/collection`

### Usage

Create your own collection class that extends abstract parent.

```php
<?php

// Parent class.
use Silvanus\Collection\AbstractCollection;

class DummyCollection extends AbstractCollection
{
    /**
     * Provide your class with getType function.
     * Return fully qualified namespace of your tpye. 
     */
    protected function getType() : string {
        return 'Acme\App\DummyEntity';
    }
}

```

And thats it. Your collection works like an array, but only accepts your defined type.

```php
<?php

// Your collection
use Acme\App\DummyCollection;

// Your object.
use Acme\App\DummyEntity;

$collection = new DummyCollection();

// All good.
$collection[] = new DuDummyEntity(1);
$collection[] = new DummyEntity(2);

// Exception thrown
$collection[] = new DateTime();

```