#!/bin/bash

shopt -s dotglob
SOURCE="/home/u556946406/domains/spacehub-id.com/public_html/spacehub/public"
TARGET="/home/u556946406/domains/spacehub-id.com/public_html"

cd "$SOURCE" || exit

for item in *; do
  # Lewati jika * tidak match ke file apa pun
  [ "$item" = "*" ] && continue

  if [ ! -e "$TARGET/$item" ]; then
    ln -s "$SOURCE/$item" "$TARGET/$item"
    echo "Linked: $item"
  else
    echo "Skipped (already exists): $item"
  fi
done
