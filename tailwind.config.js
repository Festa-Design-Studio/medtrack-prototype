import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", "Figtree", ...defaultTheme.fontFamily.sans],
            },

            // Complete Typography System (Senior-Optimized)
            fontSize: {
                // Senior-friendly scale with proper line heights
                xs: ["0.875rem", { lineHeight: "1.4" }], // 14px
                sm: ["1rem", { lineHeight: "1.5" }], // 16px
                base: ["1.125rem", { lineHeight: "1.6" }], // 18px (senior base)
                lg: ["1.25rem", { lineHeight: "1.6" }], // 20px
                xl: ["1.5rem", { lineHeight: "1.25" }], // 24px
                "2xl": ["1.875rem", { lineHeight: "1.25" }], // 30px
                "3xl": ["2.25rem", { lineHeight: "1.2" }], // 36px

                // Legacy senior tokens (for backward compatibility)
                senior: ["1.125rem", "1.75rem"],
                "senior-lg": ["1.25rem", "1.875rem"],
                "senior-xl": ["1.5rem", "2.25rem"],
            },

            // Comprehensive Spacing System
            spacing: {
                // Design system spacing tokens
                xs: "4px", // Tight spacing
                sm: "8px", // Small gaps
                md: "16px", // Base spacing (touch-friendly)
                lg: "24px", // Section spacing
                xl: "32px", // Large gaps
                "2xl": "40px", // Page spacing
                "3xl": "48px", // Maximum spacing

                // Touch target sizing
                touch: "44px", // Minimum touch target
                "touch-lg": "48px", // Large touch target
            },

            // Touch Target Utilities
            minHeight: {
                touch: "44px", // Minimum touch target for seniors
                "touch-lg": "48px", // Large touch target
            },
            minWidth: {
                touch: "44px", // Minimum touch target for seniors
                "touch-lg": "48px", // Large touch target
            },

            // Extended Color Palette System
            colors: {
                // Primary Color Palette (Blue)
                primary: {
                    50: "#E6F0FB",
                    100: "#CCE0F7",
                    200: "#99C1F0",
                    300: "#66A2E8",
                    400: "#3383E1",
                    500: "#005FCC", // Default primary
                    600: "#0047A3",
                    700: "#00357A",
                    800: "#002B66",
                    900: "#001F4D",
                },

                // Secondary Color Palette (Yellow)
                secondary: {
                    50: "#FFFBEA",
                    100: "#FFF3C4",
                    200: "#FFE69E",
                    300: "#FFD95A", // Default secondary
                    400: "#F7C948",
                    500: "#F0B429",
                    600: "#DE911D",
                    700: "#CB6E17",
                    800: "#B44D12",
                    900: "#8D2B0B",
                },

                // Success Color Palette (Green)
                success: {
                    50: "#F0FDF4",
                    100: "#D3F9D8",
                    200: "#BBF7D0",
                    300: "#9AE6B4",
                    400: "#68D391",
                    500: "#2F855A", // Default success
                    600: "#38A169",
                    700: "#276749",
                    800: "#22543D",
                    900: "#1C4532",
                },

                // Warning Color Palette (Orange)
                warning: {
                    50: "#FFFBEB",
                    100: "#FEF3C7",
                    200: "#FDE68A",
                    300: "#FCD34D",
                    400: "#FBBF24",
                    500: "#ED8936", // Default warning
                    600: "#D69E2E",
                    700: "#C05621",
                    800: "#9C4221",
                    900: "#7C2D12",
                },

                // Error Color Palette (Red)
                error: {
                    50: "#FEF2F2",
                    100: "#FEE2E2",
                    200: "#FECACA",
                    300: "#FC8181",
                    400: "#F56565",
                    500: "#C53030", // Default error
                    600: "#E53E3E",
                    700: "#9B2C2C",
                    800: "#822727",
                    900: "#63171B",
                },

                // Neutral Color Palette (Gray)
                neutral: {
                    50: "#F9FAFB",
                    100: "#F3F4F6",
                    200: "#E5E7EB",
                    300: "#D1D5DB",
                    400: "#9CA3AF",
                    500: "#6B7280",
                    600: "#4B5563",
                    700: "#374151",
                    800: "#1F2937",
                    900: "#111827",
                },

                // Legacy senior colors (for backward compatibility)
                senior: {
                    primary: "#1e40af", // Blue-700
                    "primary-dark": "#1e3a8a", // Blue-800
                    success: "#166534", // Green-800
                    warning: "#ca8a04", // Yellow-600
                    danger: "#dc2626", // Red-600
                    text: "#111827", // Gray-900
                    "text-light": "#374151", // Gray-700
                    bg: "#ffffff",
                    "bg-light": "#f9fafb", // Gray-50
                },
            },

            // Container Sizes (Responsive)
            maxWidth: {
                "container-sm": "640px", // Small container
                "container-md": "768px", // Medium container
                "container-lg": "1024px", // Large container
                "container-xl": "1280px", // Extra large container
            },

            // Border Radius (Consistent with design system)
            borderRadius: {
                sm: "4px",
                md: "8px",
                lg: "12px",
                xl: "16px",
                "2xl": "24px",
            },

            // Box Shadow (Subtle and accessible)
            boxShadow: {
                soft: "0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)",
                medium: "0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)",
                large: "0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)",
            },
        },
    },

    plugins: [forms],
};
