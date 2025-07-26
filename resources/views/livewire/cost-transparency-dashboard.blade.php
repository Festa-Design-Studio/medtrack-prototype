<div class="space-y-lg" role="main" aria-labelledby="dashboard-title">
  <!-- Page Header -->
  <header>
    <h1 id="dashboard-title" class="text-3xl font-bold text-neutral-900">Healthcare Cost Transparency</h1>
    <p class="text-lg text-neutral-600 mt-sm">
      Know your costs before you receive care - addressing your right to price transparency
    </p>
    <!-- RFI Quote Reference -->
    <blockquote class="mt-md p-md bg-primary-50 border-l-4 border-primary-500 rounded-r-lg">
      <p class="text-base italic text-primary-800">
        "Patients should know costs BEFORE receiving care" 
      </p>
      <cite class="text-sm text-primary-600">- Patient feedback from CMS-2019-0039</cite>
    </blockquote>
  </header>
  
  <!-- Total Spending Overview -->
  <section aria-labelledby="spending-overview">
    <h2 id="spending-overview" class="sr-only">Total healthcare spending overview</h2>
    <div class="card bg-gradient-to-r from-primary-500 to-primary-600 text-white" role="banner">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-2xl font-bold">Your Healthcare Spending</h3>
          <p class="text-primary-100">Complete transparency for informed decisions</p>
        </div>
        <div class="text-right">
          <p class="text-4xl font-bold" aria-label="Total spending this year">${{ number_format($totalYearlySpending) }}</p>
          <p class="text-primary-100">${{ number_format($monthlySpending) }} this month</p>
        </div>
      </div>
      
      <!-- Quick export action -->
      <div class="mt-lg flex space-x-md">
        <button wire:click="exportCostData('pdf')" 
                class="btn-secondary bg-white/20 hover:bg-white/30 text-white border-white/30">
          Export to PDF
        </button>
        <button wire:click="exportCostData('csv')" 
                class="btn-secondary bg-white/20 hover:bg-white/30 text-white border-white/30">
          Export to Spreadsheet
        </button>
      </div>
    </div>
  </section>
  
  <!-- Cost Breakdown Grid -->
  <section aria-labelledby="cost-breakdown">
    <h2 id="cost-breakdown" class="text-2xl font-semibold text-neutral-900 mb-lg">Cost Breakdown by Category</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-lg" role="group">
      
      <!-- Medications Card -->
      <article class="card hover:shadow-medium transition-shadow">
        <div class="flex items-center justify-between">
          <div>
            <h3 class="text-lg font-semibold text-neutral-900">Medications</h3>
            <p class="text-2xl font-bold text-primary-600" aria-label="Monthly medication costs">
              ${{ number_format($medicationCosts) }}
            </p>
            <p class="text-sm text-neutral-600">Monthly average</p>
          </div>
          <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
          </svg>
        </div>
        <div class="mt-md space-y-sm">
          <button wire:click="explorePharmacySavings" 
                  class="btn-secondary w-full" 
                  aria-describedby="med-savings-help">
            Find Savings
          </button>
          <p id="med-savings-help" class="text-xs text-neutral-600">Compare pharmacy prices to save money</p>
        </div>
      </article>
      
      <!-- Doctor Visits Card -->
      <article class="card hover:shadow-medium transition-shadow">
        <div class="flex items-center justify-between">
          <div>
            <h3 class="text-lg font-semibold text-neutral-900">Doctor Visits</h3>
            <p class="text-2xl font-bold text-success-600" aria-label="Doctor visit costs last 3 months">
              ${{ number_format($doctorVisitCosts) }}
            </p>
            <p class="text-sm text-neutral-600">Last 3 months</p>
          </div>
          <svg class="w-8 h-8 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
        </div>
        <div class="mt-md">
          <button wire:click="schedulePreventiveCare('annual-physical')" 
                  class="btn-secondary w-full" 
                  aria-describedby="visit-savings-help">
            Schedule Preventive Care
          </button>
          <p id="visit-savings-help" class="text-xs text-neutral-600">Prevent costly emergency visits</p>
        </div>
      </article>
      
      <!-- Tests & Procedures Card -->
      <article class="card hover:shadow-medium transition-shadow">
        <div class="flex items-center justify-between">
          <div>
            <h3 class="text-lg font-semibold text-neutral-900">Tests & Labs</h3>
            <p class="text-2xl font-bold text-warning-600" aria-label="Medical tests cost this year">
              ${{ number_format($testsCosts) }}
            </p>
            <p class="text-sm text-neutral-600">This year</p>
          </div>
          <svg class="w-8 h-8 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
          </svg>
        </div>
        <div class="mt-md">
          <a href="/vitals" class="btn-secondary w-full inline-block text-center" 
             aria-describedby="tests-help">
            View Test History
          </a>
          <p id="tests-help" class="text-xs text-neutral-600">Avoid duplicate tests by sharing history</p>
        </div>
      </article>
    </div>
  </section>
  
  <!-- Upcoming Costs Section -->
  <section aria-labelledby="upcoming-costs">
    <h2 id="upcoming-costs" class="text-2xl font-semibold text-neutral-900 mb-lg">Upcoming Healthcare Costs</h2>
    <div class="card">
      <div class="card-header">
        <h3 class="text-xl font-semibold text-neutral-900">Plan Ahead for Expected Expenses</h3>
        <p class="text-base text-neutral-600">Know what you'll pay before your appointment</p>
      </div>
      
      <div class="space-y-md" role="list">
        @forelse($upcomingCosts as $cost)
          <article class="flex items-center justify-between p-md border border-neutral-200 rounded-lg" role="listitem">
            <div class="flex-1">
              <h4 class="text-base font-medium text-neutral-900">{{ $cost['service'] }}</h4>
              <p class="text-sm text-neutral-600">Scheduled for {{ $cost['date'] }}</p>
              <div class="flex items-center mt-xs space-x-md">
                <span class="text-xs px-sm py-xs rounded-full 
                           {{ $cost['confidence'] === 'High' ? 'bg-success-100 text-success-800' : 'bg-warning-100 text-warning-800' }}">
                  {{ $cost['confidence'] }} confidence estimate
                </span>
              </div>
            </div>
            <div class="text-right">
              <p class="text-lg font-semibold text-neutral-900" aria-label="Your cost after insurance">
                ${{ number_format($cost['patient_cost']) }}
              </p>
              <p class="text-sm text-success-600">After insurance</p>
              <p class="text-xs text-neutral-500">
                (Total: ${{ number_format($cost['estimated_cost']) }})
              </p>
            </div>
          </article>
        @empty
          <div class="text-center py-lg">
            <svg class="w-12 h-12 text-neutral-400 mx-auto mb-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <p class="text-base text-neutral-600">No upcoming appointments scheduled</p>
            <button class="btn-primary mt-md">Schedule Appointment</button>
          </div>
        @endforelse
      </div>
    </div>
  </section>
  
  <!-- Savings Opportunities -->
  <section aria-labelledby="savings-opportunities">
    <h2 id="savings-opportunities" class="text-2xl font-semibold text-neutral-900 mb-lg">Money-Saving Opportunities</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
      @foreach($savingsOpportunities as $opportunity)
        <article class="card border-l-4 border-success-500">
          <div class="flex items-start justify-between">
            <div class="flex-1">
              <h3 class="text-lg font-semibold text-neutral-900">
                Save ${{ number_format($opportunity['potential_savings']) }}/{{ $opportunity['frequency'] }}
              </h3>
              <p class="text-base text-neutral-600 mt-sm">{{ $opportunity['description'] }}</p>
              <p class="text-sm text-neutral-500 mt-sm">
                <strong>Action needed:</strong> {{ $opportunity['action_required'] }}
              </p>
            </div>
            <div class="flex-shrink-0 ml-md">
              <span class="inline-flex items-center px-sm py-xs rounded-full text-sm font-medium bg-success-100 text-success-800">
                <svg class="w-4 h-4 mr-xs" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8.07 7.949 8.433 7.418zM11 12.849v-1.698c.22.071.412.164.567.267.364.532.364.923 0 1.454-.155.103-.346.196-.567.267z"></path>
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6.602 7.766 7.324 8.246 7.676 8.48 8.145 8.663 8.97 8.818a3.126 3.126 0 00.54.117v1.698a2.582 2.582 0 01-.567-.267c-.364-.532-.364-.923 0-1.454.364-.532.97-.569 1.176-.662v.092z" clip-rule="evenodd"></path>
                </svg>
                Potential Savings
              </span>
            </div>
          </div>
          <div class="mt-lg">
            @if($opportunity['type'] === 'pharmacy_switch')
              <button wire:click="explorePharmacySavings" class="btn-success">
                Compare Pharmacy Prices
              </button>
            @elseif($opportunity['type'] === 'preventive_care')
              <button wire:click="schedulePreventiveCare('annual-physical')" class="btn-success">
                Schedule Preventive Care
              </button>
            @else
              <button class="btn-success">Take Action</button>
            @endif
          </div>
        </article>
      @endforeach
    </div>
  </section>
  
  <!-- Cost Transparency Information -->
  <aside class="card bg-primary-50 border-primary-200" role="complementary" aria-labelledby="transparency-info">
    <h2 id="transparency-info" class="text-xl font-semibold text-primary-900 mb-md">
      Your Right to Price Transparency
    </h2>
    <div class="space-y-sm text-base text-primary-800">
      <p>
        <svg class="w-5 h-5 inline mr-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <strong>You have the right to know healthcare costs in advance.</strong>
      </p>
      <p>
        This dashboard addresses feedback from 1,611 patient comments calling for price transparency in healthcare.
      </p>
      <p>
        <a href="/help/price-transparency" class="text-primary-700 underline hover:text-primary-800">
          Learn more about your healthcare cost rights →
        </a>
      </p>
    </div>
  </aside>
</div>
