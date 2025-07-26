# 🏥 MedTrack - Senior-Friendly Health Tracker

## 🎯 Project Overview

MedTrack is a Laravel-based health tracking application designed specifically for seniors and their caregivers. It features accessibility-first design, trauma-informed UX, and integration with the MedTrack MCP (Model Context Protocol) server for enhanced development capabilities.

**Created by**: Festa Design Studio for Civic Hack DC 2024  
**Purpose**: Address healthcare pain points identified in 1,611 public comments from CMS-2019-0039 RFI docket  
**Problem**: Transform documented healthcare frustrations into accessible, senior-focused digital health solutions

## 🔬 RFI-Centered Design Framework

### **Evidence-Based UX Approach**

MedTrack's design is directly informed by analysis of **1,611 public comments** from the CMS-2019-0039 RFI docket, which revealed critical healthcare pain points:

-   **Primary Data Source**: 1,611 public comments from CMS-2019-0039 docket
-   **User Voice Integration**: Direct quotes and pain points drive feature prioritization
-   **Policy-to-Product Pipeline**: Government feedback → User needs → Design solutions → Prototype features

### **Key Pain Points Addressed**

#### **🏥 Price Transparency (Primary User Demand)**

> _"Patients should know costs BEFORE receiving care"_ - RFI Comment

**MedTrack Response**: Medication cost tracking, provider price comparison, budget planning dashboard

#### **📱 Patient Data Access & Control**

> _"Real-time, machine-readable access to our complete health information"_ - RFI Comment

**MedTrack Response**: One-click health record access, granular sharing controls, digital-first communication

#### **🔄 Healthcare System Interoperability**

> _"1 in 10 patients have had to redo a test due to lack of information access"_ - RFI Comment

**MedTrack Response**: Test history tracking, care team coordination, emergency medical summaries

#### **🔒 Security & Privacy Concerns**

> _"This cyber risk could pose a huge personal identity and information theft"_ - RFI Comment

**MedTrack Response**: Privacy dashboard, access logs, local-first data storage options

### **User-Centered Design Principles**

1. **Real Pain Points**: Every feature addresses documented user frustrations
2. **Accessibility First**: Senior-focused design based on actual user limitations
3. **Digital Equity**: Solutions for underserved and rural populations
4. **Privacy by Design**: Address security concerns proactively

## 🏗️ Architecture & Foundation

### Tech Stack

-   **Backend**: Laravel 12 + Livewire 3 + SQLite
-   **Frontend**: Tailwind CSS + Alpine.js
-   **Authentication**: Laravel Breeze
-   **MCP Integration**: Custom MedTrack MCP Server
-   **Deployment Target**: GitHub Pages + Render/Vercel

### Key Features Implemented

✅ **Database Schema**

-   Users (with caregiver support)
-   Medications management
-   Vitals tracking
-   Appointments scheduling

✅ **Accessibility Foundation**

-   WCAG AA compliant color schemes
-   44px+ touch targets for seniors
-   Large fonts (18px base)
-   High contrast mode support
-   Screen reader compatibility
-   Keyboard navigation

✅ **Livewire Components**

-   Dashboard (health summary)
-   MedicationTracker (med management)
-   VitalsLogger (vitals tracking)

✅ **Senior-Friendly CSS**

-   Custom senior color palette
-   Component library (.btn-primary, .card, etc.)
-   Form accessibility enhancements
-   Trauma-informed design principles

## 🚀 Getting Started

### Prerequisites

-   PHP 8.1+
-   Composer
-   Node.js 18+
-   SQLite

### Installation

1. **Navigate to the app directory**:

    ```bash
    cd medtrack-app
    ```

2. **Install dependencies**:

    ```bash
    composer install
    npm install
    ```

3. **Environment setup**:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database setup** (SQLite already configured):

    ```bash
    php artisan migrate
    ```

5. **Build assets**:

    ```bash
    npm run build
    # or for development:
    npm run dev
    ```

6. **Start development server**:
    ```bash
    php artisan serve
    ```

Visit: http://localhost:8000

## 🎨 Design System

### Colors (Senior-Friendly)

```css
senior-primary: #1e40af (Blue-700)
senior-success: #166534 (Green-800)
senior-warning: #ca8a04 (Yellow-600)
senior-danger: #dc2626 (Red-600)
senior-text: #111827 (Gray-900)
senior-bg: #ffffff (White)
```

### Typography

-   Base font size: 18px (senior-friendly)
-   Line height: 1.75 (improved readability)
-   Font family: Figtree (clean, readable)

### Components

-   `.btn-primary` - Primary action buttons
-   `.btn-secondary` - Secondary actions
-   `.card` - Content containers
-   `.form-input` - Accessible form inputs
-   `.alert-*` - Status messages

## 🧱 Database Models

### User

-   `name`, `email`, `phone`
-   `is_caregiver` (boolean)
-   Relations: medications, vitals, appointments

### Medication

-   `name`, `dosage`, `schedule_time`, `frequency`
-   `notes` (optional)
-   Belongs to: user

### Vital

-   `blood_pressure`, `blood_sugar`, `weight`, `mood`
-   `note`, `recorded_at`
-   Belongs to: user

### Appointment

-   `title`, `appointment_at`, `location`
-   `notes` (optional)
-   Belongs to: user

## 🔧 MCP Integration

### Available MCP Tools

1. **create_accessible_component** - Generate senior-friendly UI
2. **validate_cms_compliance** - Check accessibility
3. **generate_color_scheme** - WCAG-compliant colors
4. **deployment_checklist** - GitHub Pages guidance

### Using MCP in Cursor

```
Create a large button for medication logging using MedTrack MCP
Validate this form for CMS compliance using MedTrack MCP
Generate high-contrast colors for seniors using MedTrack MCP
```

## 📱 Core Features (Next Steps)

### Dashboard ✅

-   Today's medications overview
-   Recent vitals display
-   Upcoming appointments
-   Quick action buttons

### Medication Management (In Progress)

-   Add/edit/delete medications
-   Schedule reminders
-   Dosage tracking

### Vitals Logging (In Progress)

-   Blood pressure tracking
-   Blood sugar monitoring
-   Weight logging
-   Mood tracking

### Appointments (Planned)

-   Schedule management
-   Reminder system
-   Location tracking

## 🎯 Accessibility Features

### WCAG AA Compliance

-   ✅ Color contrast ratios > 4.5:1
-   ✅ Keyboard navigation support
-   ✅ Screen reader compatibility
-   ✅ Touch targets > 44px
-   ✅ Focus indicators
-   ✅ Alternative text for images

### Senior-Specific Design

-   ✅ Large text (18px+ base)
-   ✅ Simple navigation
-   ✅ High contrast options
-   ✅ Generous spacing
-   ✅ Clear visual hierarchy

### Trauma-Informed UX

-   ✅ Gentle language choices
-   ✅ Clear expectations
-   ✅ Optional help text
-   ✅ Non-threatening colors
-   ✅ User control and choice

## 🚀 Deployment

### GitHub Pages (Frontend)

```bash
npm run build
# Deploy dist/ folder to GitHub Pages
```

### Backend Hosting (Render/Vercel)

```bash
# See deployment_checklist MCP tool for guidance
```

## 🧪 Testing

### Manual Testing

```bash
# Create test user
php artisan tinker
> User::factory()->create(['email' => 'senior@test.com'])

# Test components
# Visit /dashboard, /medications, /vitals
```

### Accessibility Testing

-   Test with screen reader (VoiceOver/NVDA)
-   Keyboard-only navigation
-   Color contrast validation
-   Mobile responsiveness

## 📚 Development Guidelines

### Adding New Components

1. Use MedTrack MCP tools for generation
2. Follow senior-friendly design principles
3. Ensure WCAG AA compliance
4. Test with actual users when possible

### CSS Guidelines

-   Use established design tokens
-   Maintain 44px+ touch targets
-   Test in high contrast mode
-   Validate with accessibility tools

### Database Changes

```bash
php artisan make:migration create_new_table
# Edit migration file
php artisan migrate
```

## 🤝 Contributing

1. Follow accessibility-first development
2. Use trauma-informed language
3. Test with senior users
4. Validate with MCP tools
5. Document accessibility features

## 📞 Support

For seniors and caregivers using this app:

-   Large text and simple navigation
-   Help text on every page
-   Clear error messages
-   Contact information readily available

## 📊 Research Foundation

### Data Sources

-   **CMS-2019-0039**: 1,611 public comments on healthcare interoperability
-   **HHS-ONC-2019-0002**: 1,920 comments on 21st Century Cures Act implementation
-   **CMS-2022-0163**: 647 comments on national healthcare provider directory

### Stakeholder Perspectives

-   **Individual Patients**: Focus on price transparency and data access
-   **Healthcare Providers**: Support interoperability for better patient care
-   **Rural Communities**: Emphasize need for information sharing to overcome geographic barriers
-   **Patient Advocates**: Push for patient control and modern digital access

### Success Metrics

-   Users report knowing costs before care
-   Reduced time to access health records
-   Fewer duplicate tests reported
-   High trust ratings in app security
-   Successful data sharing rates

---

**Built with ❤️ for senior health and wellness using Laravel, Livewire, and MCP.**

**This project demonstrates how participatory democracy can drive user-centered technology development by transforming 1,611 public policy comments into accessible healthcare solutions.**
