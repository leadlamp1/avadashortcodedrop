# avadashortcodedrop
Quick and easy plugin to strip Avada builder shortcodes from post content on your website. Preserves text and images.

# Remove Avada Shortcodes (WordPress Plugin)

This WordPress plugin removes all **Avada Builder shortcodes** from post content on your site while preserving the text and image HTML inside the shortcodes.

It's especially useful if you've migrated a site away from using the Avada theme or Fusion Builder, and want to clean up post content for a new theme or builder.

---

## Features

- Removes all `[fusion_*]...[/fusion_*]` shortcodes but keeps inner content.
- Removes self-closing Avada shortcodes like `[fusion_separator]`.
- Cleans up any leftover closing tags like `[/fusion_text]`.
- Works on all blog posts (`post` post type).
- Easy one-click process in the WordPress admin panel.

> **Note:** This plugin modifies content directly in your WordPress database. Be sure to back up your content before running the cleanup.

---

## Installation

1. Download or clone this repository.
2. Create a folder named `remove-avada-shortcodes` in your `/wp-content/plugins/` directory.
3. Place the `remove-avada-shortcodes.php` file into that folder.
4. Log in to your WordPress admin.
5. Go to **Plugins > Installed Plugins** and activate **Remove Avada Shortcodes**.

---

## Usage

1. After activating the plugin, go to **Tools > Remove Avada Shortcodes**.
2. Click **"Run Cleanup"** to process all blog posts and strip out Avada shortcodes.
3. A success message will appear once the cleanup is complete.

---

## Disclaimer

This project was developed independently before I became aware of similar tools. It offers a different implementation approach that may be useful depending on your needs.

---

## License

This plugin is open-source and free to use under the [MIT License](LICENSE).
