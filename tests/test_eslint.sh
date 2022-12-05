#!/bin/bash

cd "$(dirname "${BASH_SOURCE[0]}")/../"

printf 'eslint version: %s\n' "$(eslint --version)"

eval eslint \
    --ignore-pattern vendor/ \
    --ignore-pattern node_modules/ \
    --ignore-pattern gulpfile.js \
    --ignore-pattern '*.min.js' \
    --ignore-pattern admin/multi-role/ \
    --ignore-pattern assets/styles/foundation-sites/ \
    .
