# 🧬 MedTrack Atomic Design System v2.0

> **Evidence-Based Component Architecture**: Built from analysis of **1,611 CMS public comments** and **7 major healthcare pain points**. Every component addresses real user frustrations documented in federal regulatory feedback.

---

## 🔬 Research Foundation

This atomic design system is built on **real user pain points** from CMS-2019-0039 RFI analysis:

1. **Price Transparency** (Most frequent complaint)
2. **Patient Data Access & Control**
3. **Healthcare System Interoperability**
4. **Security & Privacy Concerns**
5. **Information Blocking Issues**
6. **Market Competition Concerns**
7. **Technical Implementation Barriers**

Every component below directly addresses these documented user needs.

---

## ⚛️ **ATOMS** - Foundational Design Elements

### **🏷️ Price/Cost Indicators**

**User Need**: _"Patients should know costs BEFORE receiving care"_

```html
<!-- Cost Badge Atom -->
<span
    class="inline-flex items-center px-md py-xs rounded-full text-sm font-medium bg-success-100 text-success-800"
>
    <svg class="w-4 h-4 mr-xs" fill="currentColor" viewBox="0 0 20 20">
        <path
            d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8.07 7.949 8.433 7.418zM11 12.849v-1.698c.22.071.412.164.567.267.364.532.364.923 0 1.454-.155.103-.346.196-.567.267z"
        ></path>
        <path
            fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6.602 7.766 7.324 8.246 7.676 8.48 8.145 8.663 8.97 8.818a3.126 3.126 0 00.54.117v1.698a2.582 2.582 0 01-.567-.267c-.364-.532-.364-.923 0-1.454.364-.532.97-.569 1.176-.662v.092z"
            clip-rule="evenodd"
        ></path>
    </svg>
    $24.99/month
</span>

<!-- Cost Alert Atom -->
<div class="flex items-center text-warning-600">
    <svg class="w-5 h-5 mr-xs" fill="currentColor" viewBox="0 0 20 20">
        <path
            fill-rule="evenodd"
            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
            clip-rule="evenodd"
        ></path>
    </svg>
    <span class="text-base font-medium">Price increased 15%</span>
</div>

<!-- Insurance Coverage Indicator -->
<div class="flex items-center">
    <div class="w-3 h-3 bg-success-500 rounded-full mr-xs"></div>
    <span class="text-sm text-neutral-600">Covered by insurance</span>
</div>
```

### **🏆 Status Badges**

**User Need**: Provider transparency and data sharing capability

```html
<!-- Provider Digital Capability Badge -->
<div class="inline-flex items-center">
    <div class="flex">
        <svg
            class="w-4 h-4 text-warning-400"
            fill="currentColor"
            viewBox="0 0 20 20"
        >
            <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
            ></path>
        </svg>
        <!-- Repeat for 5 stars -->
    </div>
    <span class="ml-xs text-sm text-neutral-600">Full Digital Access</span>
</div>

<!-- Data Sharing Status -->
<span
    class="inline-flex items-center px-sm py-xs rounded-md text-xs font-medium bg-primary-100 text-primary-800"
>
    <div class="w-2 h-2 bg-primary-500 rounded-full mr-xs"></div>
    Sharing with Dr. Smith
</span>

<!-- Security Status Indicator -->
<div class="flex items-center text-success-600">
    <svg
        class="w-5 h-5 mr-xs"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
        ></path>
    </svg>
    <span class="text-sm font-medium">Your data is secure</span>
</div>
```

### **🏥 Health Icons**

**User Need**: Clear visual communication for health data

```html
<!-- Medication Icon Set -->
<svg
    class="w-6 h-6 text-primary-600"
    fill="none"
    stroke="currentColor"
    viewBox="0 0 24 24"
>
    <!-- Pills -->
    <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"
    ></path>
</svg>

<!-- Heart Rate -->
<svg
    class="w-6 h-6 text-error-500"
    fill="none"
    stroke="currentColor"
    viewBox="0 0 24 24"
>
    <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
    ></path>
</svg>

<!-- Doctor/Provider -->
<svg
    class="w-6 h-6 text-neutral-600"
    fill="none"
    stroke="currentColor"
    viewBox="0 0 24 24"
>
    <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
    ></path>
</svg>
```

### **📊 Progress Indicators**

**User Need**: Visual feedback for health goals and medication adherence

```html
<!-- Medication Adherence Progress -->
<div class="w-full bg-neutral-200 rounded-full h-3">
    <div class="bg-success-500 h-3 rounded-full" style="width: 85%"></div>
</div>
<p class="text-sm text-neutral-600 mt-xs">85% adherence this month</p>

<!-- Daily Progress Ring -->
<div class="relative w-16 h-16">
    <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 64 64">
        <circle
            cx="32"
            cy="32"
            r="28"
            stroke="#e5e7eb"
            stroke-width="4"
            fill="none"
        />
        <circle
            cx="32"
            cy="32"
            r="28"
            stroke="#10b981"
            stroke-width="4"
            fill="none"
            stroke-dasharray="175.929"
            stroke-dashoffset="35.186"
            stroke-linecap="round"
        />
    </svg>
    <div class="absolute inset-0 flex items-center justify-center">
        <span class="text-lg font-semibold text-neutral-900">3/4</span>
    </div>
</div>
```

---

## 🧪 **MOLECULES** - Component Combinations

### **💊 Medication Cards**

**User Need**: Clear medication management with cost transparency

```html
<div class="card border-l-4 border-primary-500">
    <div class="flex items-start justify-between">
        <div class="flex items-start space-x-md">
            <div class="flex-shrink-0">
                <svg
                    class="w-8 h-8 text-primary-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"
                    ></path>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="text-lg font-semibold text-neutral-900">
                    Metformin 500mg
                </h3>
                <p class="text-base text-neutral-600">Take with breakfast</p>
                <div class="flex items-center mt-sm space-x-lg">
                    <span
                        class="inline-flex items-center px-sm py-xs rounded-full text-sm font-medium bg-success-100 text-success-800"
                    >
                        <svg
                            class="w-4 h-4 mr-xs"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8.07 7.949 8.433 7.418zM11 12.849v-1.698c.22.071.412.164.567.267.364.532.364.923 0 1.454-.155.103-.346.196-.567.267z"
                            ></path>
                            <path
                                fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6.602 7.766 7.324 8.246 7.676 8.48 8.145 8.663 8.97 8.818a3.126 3.126 0 00.54.117v1.698a2.582 2.582 0 01-.567-.267c-.364-.532-.364-.923 0-1.454.364-.532.97-.569 1.176-.662v.092z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        $24.99/month
                    </span>
                    <div class="flex items-center">
                        <div
                            class="w-3 h-3 bg-success-500 rounded-full mr-xs"
                        ></div>
                        <span class="text-sm text-neutral-600">Covered</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-end space-y-sm">
            <button
                class="min-h-touch px-md py-sm bg-primary-500 text-white rounded-lg text-sm font-medium hover:bg-primary-600"
            >
                Taken Today
            </button>
            <span class="text-xs text-neutral-500">Next: Tomorrow 8 AM</span>
        </div>
    </div>
</div>
```

### **💰 Cost Comparison Tools**

**User Need**: _"I might go out of the area if I knew what the costs were elsewhere"_

```html
<div class="card">
    <div class="card-header">
        <h3 class="text-xl font-semibold text-neutral-900">
            Prescription Costs
        </h3>
        <p class="text-base text-neutral-600">
            Compare prices across pharmacies
        </p>
    </div>

    <div class="space-y-md">
        <!-- Pharmacy Option -->
        <div
            class="flex items-center justify-between p-md border border-neutral-200 rounded-lg hover:border-primary-300"
        >
            <div class="flex items-center space-x-md">
                <div
                    class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center"
                >
                    <svg
                        class="w-6 h-6 text-primary-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                        ></path>
                    </svg>
                </div>
                <div>
                    <h4 class="text-base font-medium text-neutral-900">
                        CVS Pharmacy
                    </h4>
                    <p class="text-sm text-neutral-600">
                        2.3 miles away • Open until 10 PM
                    </p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-lg font-semibold text-neutral-900">$24.99</p>
                <p class="text-sm text-success-600">Lowest price</p>
            </div>
        </div>

        <!-- More pharmacy options... -->
    </div>

    <div class="mt-lg p-md bg-primary-50 rounded-lg">
        <div class="flex items-center">
            <svg
                class="w-5 h-5 text-primary-600 mr-sm"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                ></path>
            </svg>
            <span class="text-sm text-primary-800"
                >You could save $12.50/month by switching pharmacies</span
            >
        </div>
    </div>
</div>
```

### **🔐 Data Access Controls**

**User Need**: _"Patients want to control WHO sees WHAT parts of their medical records"_

```html
<div class="card">
    <div class="card-header">
        <h3 class="text-xl font-semibold text-neutral-900">
            Share with Dr. Johnson
        </h3>
        <p class="text-base text-neutral-600">
            Choose what information to share
        </p>
    </div>

    <div class="space-y-md">
        <!-- Data Category Toggle -->
        <div class="flex items-center justify-between py-sm">
            <div class="flex items-center space-x-md">
                <svg
                    class="w-5 h-5 text-neutral-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"
                    ></path>
                </svg>
                <div>
                    <h4 class="text-base font-medium text-neutral-900">
                        Medications
                    </h4>
                    <p class="text-sm text-neutral-600">
                        Current prescriptions and dosages
                    </p>
                </div>
            </div>
            <button
                type="button"
                class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-primary-600 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                role="switch"
                aria-checked="true"
            >
                <span class="sr-only">Toggle medications sharing</span>
                <span
                    aria-hidden="true"
                    class="translate-x-5 inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                ></span>
            </button>
        </div>

        <!-- More data categories... -->
    </div>

    <div class="mt-lg">
        <button class="btn-primary w-full">Update Sharing Preferences</button>
    </div>
</div>
```

### **⭐ Provider Rating Cards**

**User Need**: Provider transparency and digital capability ratings

```html
<div class="card hover:shadow-medium transition-shadow">
    <div class="flex items-start justify-between">
        <div class="flex items-start space-x-md">
            <div
                class="w-16 h-16 bg-neutral-200 rounded-full flex items-center justify-center"
            >
                <svg
                    class="w-8 h-8 text-neutral-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    ></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-neutral-900">
                    Dr. Sarah Johnson
                </h3>
                <p class="text-base text-neutral-600">Internal Medicine</p>
                <p class="text-sm text-neutral-500">
                    Georgetown University Hospital
                </p>

                <!-- Digital Capability Rating -->
                <div class="flex items-center mt-sm space-x-sm">
                    <div class="flex">
                        <!-- 5 stars filled -->
                        <svg
                            class="w-4 h-4 text-warning-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                            ></path>
                        </svg>
                        <!-- Repeat 4 more times -->
                    </div>
                    <span class="text-sm text-neutral-600"
                        >Full Digital Access</span
                    >
                </div>

                <!-- Capabilities -->
                <div class="flex flex-wrap gap-xs mt-sm">
                    <span
                        class="inline-flex items-center px-sm py-xs rounded-md text-xs font-medium bg-success-100 text-success-800"
                    >
                        <div
                            class="w-2 h-2 bg-success-500 rounded-full mr-xs"
                        ></div>
                        Online Records
                    </span>
                    <span
                        class="inline-flex items-center px-sm py-xs rounded-md text-xs font-medium bg-success-100 text-success-800"
                    >
                        <div
                            class="w-2 h-2 bg-success-500 rounded-full mr-xs"
                        ></div>
                        Secure Messaging
                    </span>
                    <span
                        class="inline-flex items-center px-sm py-xs rounded-md text-xs font-medium bg-warning-100 text-warning-800"
                    >
                        <div
                            class="w-2 h-2 bg-warning-500 rounded-full mr-xs"
                        ></div>
                        Phone Only
                    </span>
                </div>
            </div>
        </div>
        <div class="text-right">
            <p class="text-lg font-semibold text-neutral-900">$150</p>
            <p class="text-sm text-neutral-600">Office visit</p>
            <p class="text-xs text-success-600 mt-xs">Insurance covers 80%</p>
        </div>
    </div>

    <div class="mt-lg flex space-x-md">
        <button class="btn-primary flex-1">Book Appointment</button>
        <button class="btn-secondary">View Profile</button>
    </div>
</div>
```

---

## 🧬 **ORGANISMS** - Complex Component Sections

### **💰 Price Transparency Dashboard**

**User Need**: _"Patients should know costs BEFORE receiving care"_

```html
<div class="space-y-lg">
    <!-- Header with total spending -->
    <div
        class="card bg-gradient-to-r from-primary-500 to-primary-600 text-white"
    >
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold">Healthcare Spending</h2>
                <p class="text-primary-100">Year to date</p>
            </div>
            <div class="text-right">
                <p class="text-3xl font-bold">$2,847</p>
                <p class="text-primary-100">$453 this month</p>
            </div>
        </div>
    </div>

    <!-- Cost breakdown cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
        <div class="card">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-neutral-900">
                        Medications
                    </h3>
                    <p class="text-2xl font-bold text-primary-600">$127</p>
                    <p class="text-sm text-neutral-600">Monthly average</p>
                </div>
                <svg
                    class="w-8 h-8 text-primary-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"
                    ></path>
                </svg>
            </div>
        </div>

        <!-- Doctor visits card -->
        <div class="card">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-neutral-900">
                        Doctor Visits
                    </h3>
                    <p class="text-2xl font-bold text-success-600">$289</p>
                    <p class="text-sm text-neutral-600">Last 3 months</p>
                </div>
                <svg
                    class="w-8 h-8 text-success-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    ></path>
                </svg>
            </div>
        </div>

        <!-- Tests & procedures card -->
        <div class="card">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-neutral-900">
                        Tests & Labs
                    </h3>
                    <p class="text-2xl font-bold text-warning-600">$431</p>
                    <p class="text-sm text-neutral-600">This year</p>
                </div>
                <svg
                    class="w-8 h-8 text-warning-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"
                    ></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Upcoming costs -->
    <div class="card">
        <div class="card-header">
            <h3 class="text-xl font-semibold text-neutral-900">
                Upcoming Healthcare Costs
            </h3>
            <p class="text-base text-neutral-600">
                Plan ahead for expected expenses
            </p>
        </div>

        <div class="space-y-md">
            <div
                class="flex items-center justify-between p-md border border-neutral-200 rounded-lg"
            >
                <div>
                    <h4 class="text-base font-medium text-neutral-900">
                        Annual Physical - Dr. Johnson
                    </h4>
                    <p class="text-sm text-neutral-600">
                        Scheduled for March 15, 2025
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-lg font-semibold text-neutral-900">$30</p>
                    <p class="text-sm text-success-600">After insurance</p>
                </div>
            </div>
        </div>
    </div>
</div>
```

### **🔐 Data Control Center**

**User Need**: _"Real-time, machine-readable access to our complete health information"_

```html
<div class="space-y-lg">
    <!-- Access overview -->
    <div
        class="card bg-gradient-to-r from-success-500 to-success-600 text-white"
    >
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold">Your Health Data</h2>
                <p class="text-success-100">
                    Complete control and transparency
                </p>
            </div>
            <div class="flex items-center space-x-md">
                <svg
                    class="w-8 h-8 text-success-100"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                    ></path>
                </svg>
                <span class="text-success-100 font-medium"
                    >Secure & Private</span
                >
            </div>
        </div>
    </div>

    <!-- Data categories -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
        <!-- Medications data -->
        <div class="card">
            <div class="flex items-center justify-between mb-md">
                <div class="flex items-center space-x-md">
                    <svg
                        class="w-6 h-6 text-primary-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"
                        ></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-neutral-900">
                        Medications
                    </h3>
                </div>
                <span class="text-sm text-neutral-600">4 active</span>
            </div>
            <p class="text-base text-neutral-600 mb-md">
                Current prescriptions, dosages, and adherence data
            </p>
            <div class="flex space-x-sm">
                <button class="btn-secondary text-sm">View Details</button>
                <button class="btn-secondary text-sm">Export PDF</button>
                <button class="btn-secondary text-sm">Share</button>
            </div>
        </div>

        <!-- Vitals data -->
        <div class="card">
            <div class="flex items-center justify-between mb-md">
                <div class="flex items-center space-x-md">
                    <svg
                        class="w-6 h-6 text-error-500"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                        ></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-neutral-900">
                        Vital Signs
                    </h3>
                </div>
                <span class="text-sm text-neutral-600">Last 30 days</span>
            </div>
            <p class="text-base text-neutral-600 mb-md">
                Blood pressure, weight, blood sugar, and mood tracking
            </p>
            <div class="flex space-x-sm">
                <button class="btn-secondary text-sm">View Chart</button>
                <button class="btn-secondary text-sm">Export CSV</button>
                <button class="btn-secondary text-sm">Share</button>
            </div>
        </div>
    </div>

    <!-- Sharing controls -->
    <div class="card">
        <div class="card-header">
            <h3 class="text-xl font-semibold text-neutral-900">
                Who Has Access
            </h3>
            <p class="text-base text-neutral-600">
                Manage who can see your health information
            </p>
        </div>

        <div class="space-y-md">
            <!-- Provider access item -->
            <div
                class="flex items-center justify-between p-md border border-neutral-200 rounded-lg"
            >
                <div class="flex items-center space-x-md">
                    <div
                        class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center"
                    >
                        <svg
                            class="w-5 h-5 text-primary-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-base font-medium text-neutral-900">
                            Dr. Sarah Johnson
                        </h4>
                        <p class="text-sm text-neutral-600">
                            Can access: Medications, Vitals, Appointments
                        </p>
                        <p class="text-xs text-neutral-500">
                            Last accessed: 2 days ago
                        </p>
                    </div>
                </div>
                <div class="flex items-center space-x-md">
                    <button
                        class="text-sm text-primary-600 hover:text-primary-700"
                    >
                        Edit Access
                    </button>
                    <button class="text-sm text-error-600 hover:text-error-700">
                        Revoke
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-lg">
            <button class="btn-primary">Grant New Access</button>
        </div>
    </div>
</div>
```

---

## 📄 **TEMPLATES** - Page Layout Structures

### **Dashboard Template**

```html
<!DOCTYPE html>
<html lang="en" class="h-full bg-neutral-50">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>MedTrack - Your Health Dashboard</title>
        <link href="/path/to/compiled/tailwind.css" rel="stylesheet" />
    </head>
    <body class="h-full">
        <!-- Navigation Organism -->
        <nav class="bg-white shadow-sm border-b border-neutral-200">
            <!-- Navigation content -->
        </nav>

        <!-- Header with High Contrast Toggle -->
        <header class="bg-white shadow-soft">
            <div class="max-w-7xl mx-auto py-lg px-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-neutral-900">
                            Good morning, Margaret
                        </h1>
                        <p class="text-lg text-neutral-600">
                            Let's check on your health today
                        </p>
                    </div>
                    <!-- High Contrast Toggle Molecule -->
                    <livewire:high-contrast-toggle />
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="max-w-7xl mx-auto py-lg px-lg">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">
                <!-- Primary Content (2/3 width) -->
                <div class="lg:col-span-2 space-y-lg">
                    <!-- Today's Tasks Organism -->
                    <section aria-labelledby="tasks-heading">
                        <h2
                            id="tasks-heading"
                            class="text-2xl font-semibold text-neutral-900 mb-lg"
                        >
                            Today's Health Tasks
                        </h2>
                        <!-- Task cards content -->
                    </section>

                    <!-- Recent Activity Organism -->
                    <section aria-labelledby="activity-heading">
                        <h2
                            id="activity-heading"
                            class="text-2xl font-semibold text-neutral-900 mb-lg"
                        >
                            Recent Activity
                        </h2>
                        <!-- Activity feed content -->
                    </section>
                </div>

                <!-- Sidebar (1/3 width) -->
                <div class="space-y-lg">
                    <!-- Quick Actions Organism -->
                    <section aria-labelledby="actions-heading">
                        <h2
                            id="actions-heading"
                            class="text-xl font-semibold text-neutral-900 mb-md"
                        >
                            Quick Actions
                        </h2>
                        <!-- Action buttons content -->
                    </section>

                    <!-- Health Summary Organism -->
                    <section aria-labelledby="summary-heading">
                        <h2
                            id="summary-heading"
                            class="text-xl font-semibold text-neutral-900 mb-md"
                        >
                            Health Summary
                        </h2>
                        <!-- Summary cards content -->
                    </section>
                </div>
            </div>
        </main>

        <!-- Footer Organism -->
        <footer class="bg-white border-t border-neutral-200 mt-2xl">
            <!-- Footer content -->
        </footer>
    </body>
</html>
```

---

## 📱 **PAGES** - Complete User Interfaces

### **Today's Health Overview Page**

**Addresses Pain Points**: Price transparency, data access, care coordination

### **Cost Transparency Center Page**

**Addresses Pain Points**: Price transparency, market competition

### **My Data Control Portal Page**

**Addresses Pain Points**: Data access control, security concerns

### **Provider & Cost Comparison Page**

**Addresses Pain Points**: Market competition, information blocking

### **Care Team Coordination Page**

**Addresses Pain Points**: Healthcare interoperability, rural care gaps

---

## 🧰 **Enhanced MCP Tools for Component Generation**

I'll now create enhanced MCP tools that can generate these evidence-based components automatically.

---

## 📊 **Implementation Priority (RFI-Based)**

Based on the frequency of complaints in the RFI analysis:

### **Phase 1 (Most Critical)**

1. **Price Transparency Components** (Most frequent complaint)
2. **Data Access Controls** (Second most frequent)
3. **Basic Medication Management** (Foundation)

### **Phase 2 (Important)**

4. **Provider Rating & Comparison** (Market competition)
5. **Security & Privacy Indicators** (Trust building)
6. **Care Coordination Tools** (Interoperability)

### **Phase 3 (Advanced)**

7. **Advanced Analytics** (Predictive costs)
8. **API Integration Components** (Technical implementation)
9. **Reporting Tools** (Information blocking)

---

This atomic design system directly addresses the **7 major pain points** identified from **1,611 real healthcare user comments**, ensuring every component serves a documented user need rather than theoretical requirements.
