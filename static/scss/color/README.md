# @lbry/color
> Color schemes for LBRY properties



### Installation

```bash
$ npm i @lbry/color sass -D
```

We recommend using this module with [Dart Sass](https://www.npmjs.com/package/sass) for its' focus on speed and low dependency count.



### Usage

Your main Sass file:

```scss
@charset "utf-8";

@import "@lbry/color/lbry-color";
// ...your other Sass imports
```

If you want to use CSS variables in your Sass, append `.css` to the import line. So, `@import "@lbry/color/lbry-color.css"`.

In your watch scripts for Sass files, ensure you load the `node_modules` path in order to `import` this module in your project without silly prefixes like `../../../`. What a mess.

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



### License

[BSD 3-Clause](LICENSE) Copyright © LBRY Inc.
