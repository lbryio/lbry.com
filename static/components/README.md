# @lbry/components
> Styling for shared components across LBRY properties



### Installation

```bash
$ npm i @lbry/components sass -D
```

We recommend using this module with [Dart Sass](https://www.npmjs.com/package/sass) for its' focus on speed and low dependency count.

If you are using `@lbry/components`, you can safely remove [@lbry/color](https://github.com/lbryio/color) if you've already included it separately (this module includes it by default).



### Demo

[https://lbryio.github.io/components](https://lbryio.github.io/components)



### Usage

Your main Sass file:

```scss
@charset "utf-8";

@import "@lbry/components/sass/";
// ...your other Sass imports
```

In your watch scripts for Sass files, ensure you load the `node_modules` path in order to `import` this module in your project without silly prefixes like `../../../`. What a _mess_.

Example `package.json` scripts section:

```js
"scripts": {
  ...,
  "sass:dev": "sass --load-path=node_modules --watch app/sass:app/dist --style compressed",
  "sass:prod": "sass --load-path=node_modules --update app/sass:app/dist --style compressed",
  ...
}
```

They are nearly identical, save for `--watch` and `--update`. Please refer to the [Dart Sass README](https://github.com/sass/dart-sass/blob/master/README.md) for assistance on how to integrate it with your project. The [above example](https://github.com/lbryio/lbry.tech/blob/master/package.json) is taken from the `lbry.tech` repo.



### Note

To use with Webpack, you have to make use of the tilde character when referencing a file inside your `node_modules` folder. Like so:

```scss
@import "~@lbry/components/sass/";
```



### License

[BSD 3-Clause](LICENSE) Copyright © LBRY Inc.
