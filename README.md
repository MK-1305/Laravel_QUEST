# Conduit

ブログプラットフォームを作る [RealWorld](https://github.com/gothinkster/realworld/tree/main) という OSS のプロジェクトがあります。RealWorld は実世界と同じ機能を持つプラットフォームを作ることで、学習したいフレームワークの技術を習得することを目的としてたプロジェクトです。

[Conduit](https://demo.realworld.io/#/) は RealWolrd で作成する Medium.com のクローンサイトです。

今回は Counduit と同じ見た目・機能のサイトを Laravel で実装します。

## ステップ 1

[RealWorld のドキュメント](https://realworld-docs.netlify.app/docs/specs/frontend-specs/templates) を参考に、次のページの HTML と CSS を実装し、ページを作成してください。この時点では機能は作成せず、見た目を整えるだけでよいです。

-   [Home](https://realworld-docs.netlify.app/docs/specs/frontend-specs/templates#home)
-   [Create/Edit Article](https://realworld-docs.netlify.app/docs/specs/frontend-specs/templates#createedit-article)
-   [Article](https://realworld-docs.netlify.app/docs/specs/frontend-specs/templates#article)

なお、Article に関わる要素のうち、認証機能及び著者、お気に入り(`favorite`) は実装しなくてよいものとします。

## ステップ 2

ステップ 1 のページの機能を実装し、動作するようにしてください。

## ステップ 3 (advanced)

次のページの HTML と CSS を実装し、ページを作成してください。この時点では機能は作成せず、見た目を整えるだけでよいです。

-   [Authentication](https://realworld-docs.netlify.app/docs/specs/frontend-specs/templates#authentication)

## ステップ 4 (advanced)

ステップ 3 のページの機能を実装し、動作するようにしてください。

また合わせて、ステップ 1、2 の Article に関わる要素のうち、認証機能及び著者も実装してください。

## テスト

ブログプラットフォームを作る RealWorld という OSS のプロジェクトがあります。RealWorld は実世界と同じ機能を持つプラットフォームを作ることで、学習したいフレームワークの技術を習得することを目的としてたプロジェクトです。

以前作成した RealWorld のコードに、テストコードを追加しましょう。

ステップ 1
以前作成した RealWorld のコードに、テストコードを 1 つでよいので書いてください。
・HTTP リクエスト

ステップ 2 (advanced)
RealWorld のコードにおいて、何をテストすべきか、挙げてください。
・投稿機能
・ログインユーザー以外は edit や delete 表示されない

ステップ 3 (advanced)
ステップ 2 に基づいて、テストすべき優先度が特に高いと考える項目について、テストコードを書いてください。
