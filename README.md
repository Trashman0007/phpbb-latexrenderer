# phpbb-latexrenderer
A phpBB3 extension that renders LaTeX in forum posts.

# LaTeX Renderer Extension for phpBB

This extension adds LaTeX rendering to phpBB using MathJax, supporting both inline and display equations in regular and print views.

## Features
- `[tex]...[/tex]` BBCode for inline LaTeX equations (e.g., `[tex]E = mc^2[/tex]`).
- `[dtex]...[/dtex]` BBCode for display LaTeX equations (e.g., `[dtex]\sum_{i=0}^n i^2[/dtex]`).
- Supports inline (`$...$`) and display (`$$...$$`) LaTeX syntax.
- LaTeX equations render in print view (`viewtopic.php?view=print`) and print preview.

## Installation
1. Download the latest release from GitHub.
2. Extract the `acme/latexrenderer` folder to `[ROOT]/ext/`.
3. Go to the Admin Control Panel > **Customize** > **Extension Management** > **Enable** `LaTeX Renderer`.
4. Clear the forum cache (ACP > **General** > **Purge Cache**).

## Usage
- Inline equation: `[tex]E = mc^2[/tex]` or `$E = mc^2$`
- Display equation: `[dtex]\sum_{i=0}^n i^2[/dtex]` or `$$ \sum_{i=0}^n i^2 $$`
- Print view: Access via `viewtopic.php?view=print` to see printer-friendly output with rendered equations.

## Requirements
- phpBB 3.2.0 or higher
- PHP 7.0 or higher
