<article class="card border-l-4 {{ $takenToday ? 'border-success-500' : 'border-primary-500' }} 
                hover:shadow-medium transition-shadow" 
         role="article" 
         aria-labelledby="med-title-{{ $medicationId }}"
         wire:poll.60s>
  
  <!-- Medication Header -->
  <div class="flex items-start justify-between">
    <div class="flex items-start space-x-md flex-1">
      <!-- Medication Icon -->
      <div class="flex-shrink-0 {{ $takenToday ? 'text-success-600' : 'text-primary-600' }}" aria-hidden="true">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
        </svg>
      </div>
      
      <!-- Medication Details -->
      <div class="flex-1 min-w-0">
        <h3 id="med-title-{{ $medicationId }}" class="text-lg font-semibold text-neutral-900">
          {{ $name }}
        </h3>
        <p class="text-base text-neutral-600">{{ $dosage }}</p>
        
        @if($notes)
          <p class="text-sm text-neutral-500 mt-xs">{{ $notes }}</p>
        @endif
        
        <!-- Cost Information - Addresses #1 RFI Pain Point -->
        <div class="flex flex-wrap items-center mt-sm gap-md">
          <!-- Monthly Cost Badge -->
          <span class="inline-flex items-center px-sm py-xs rounded-full text-sm font-medium 
                       {{ $insuranceCovered ? 'bg-success-100 text-success-800' : 'bg-warning-100 text-warning-800' }}"
                role="text" 
                aria-label="Monthly medication cost">
            <svg class="w-4 h-4 mr-xs" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
              <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8.07 7.949 8.433 7.418zM11 12.849v-1.698c.22.071.412.164.567.267.364.532.364.923 0 1.454-.155.103-.346.196-.567.267z"></path>
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6.602 7.766 7.324 8.246 7.676 8.48 8.145 8.663 8.97 8.818a3.126 3.126 0 00.54.117v1.698a2.582 2.582 0 01-.567-.267c-.364-.532-.364-.923 0-1.454.364-.532.97-.569 1.176-.662v.092z" clip-rule="evenodd"></path>
            </svg>
            ${{ number_format($copayAmount, 2) }}/month
          </span>
          
          <!-- Insurance Coverage Status -->
          <div class="flex items-center">
            <div class="w-3 h-3 {{ $insuranceCovered ? 'bg-success-500' : 'bg-warning-500' }} rounded-full mr-xs" aria-hidden="true"></div>
            <span class="text-sm text-neutral-600">
              {{ $insuranceCovered ? 'Covered by insurance' : 'Not covered' }}
            </span>
          </div>
          
          <!-- Cost Trend Indicator -->
          @if($costTrend !== 'stable')
            <span class="inline-flex items-center px-xs py-xs rounded text-xs font-medium
                         {{ $costTrend === 'increasing' ? 'bg-error-100 text-error-800' : 'bg-success-100 text-success-800' }}">
              <svg class="w-3 h-3 mr-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                @if($costTrend === 'increasing')
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l9.2-9.2M17 17V7H7"></path>
                @else
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 7l-9.2 9.2M7 7v10h10"></path>
                @endif
              </svg>
              {{ $costTrend === 'increasing' ? 'Price increased' : 'Price decreased' }}
            </span>
          @endif
          
          <!-- Savings Opportunity -->
          @if($potentialSavings > 0)
            <button wire:click="comparePrices" 
                    class="inline-flex items-center px-xs py-xs rounded text-xs font-medium bg-primary-100 text-primary-800 hover:bg-primary-200 transition-colors"
                    aria-label="Compare prices to save ${{ number_format($potentialSavings, 2) }} per month">
              <svg class="w-3 h-3 mr-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              Save ${{ number_format($potentialSavings, 2) }}
            </button>
          @endif
        </div>
        
        <!-- Adherence Information -->
        <div class="mt-sm">
          <div class="flex items-center justify-between text-sm">
            <span class="text-neutral-600">Adherence this month:</span>
            <span class="font-medium {{ $adherenceRate >= $adherenceGoal ? 'text-success-600' : 'text-warning-600' }}">
              {{ $adherenceRate }}%
            </span>
          </div>
          <div class="w-full bg-neutral-200 rounded-full h-2 mt-xs">
            <div class="h-2 rounded-full {{ $adherenceRate >= $adherenceGoal ? 'bg-success-500' : 'bg-warning-500' }}" 
                 style="width: {{ $adherenceRate }}%"
                 aria-label="Adherence rate: {{ $adherenceRate }} percent"></div>
          </div>
          @if($missedDoses > 0)
            <p class="text-xs text-warning-600 mt-xs">
              {{ $missedDoses }} missed dose{{ $missedDoses > 1 ? 's' : '' }} this month
            </p>
          @endif
        </div>
      </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="flex flex-col items-end space-y-sm ml-md">
      @if(!$takenToday)
        <button wire:click="markAsTaken" 
                class="min-h-touch px-md py-sm bg-primary-500 text-white rounded-lg text-sm font-medium hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors"
                aria-describedby="taken-help-{{ $medicationId }}">
          Mark as Taken
        </button>
      @else
        <div class="flex items-center px-md py-sm bg-success-100 text-success-800 rounded-lg text-sm font-medium">
          <svg class="w-4 h-4 mr-xs" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          Taken Today
        </div>
      @endif
      
      @if($nextDose)
        <span id="taken-help-{{ $medicationId }}" class="text-xs text-neutral-500 text-right">
          Next: {{ $nextDose->format('M j, g:i A') }}
        </span>
      @endif
    </div>
  </div>
  
  <!-- Additional Actions Row -->
  <div class="mt-lg pt-md border-t border-neutral-200">
    <div class="flex flex-wrap gap-sm">
      <!-- Cost Comparison Button -->
      <button wire:click="comparePrices" 
              class="btn-secondary text-sm flex items-center"
              aria-label="Compare prices at different pharmacies">
        <svg class="w-4 h-4 mr-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
        </svg>
        Compare Prices
      </button>
      
      <!-- Set Reminder Button -->
      <button wire:click="setReminder" 
              class="btn-secondary text-sm flex items-center"
              aria-label="Set medication reminder">
        <svg class="w-4 h-4 mr-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5-5-5h5V3h5v14z"></path>
        </svg>
        Set Reminder
      </button>
      
      <!-- Cost History Button -->
      <button wire:click="viewCostHistory" 
              class="btn-secondary text-sm flex items-center"
              aria-label="View cost history and trends">
        <svg class="w-4 h-4 mr-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
        </svg>
        Cost History
      </button>
      
      @if(!$takenToday)
        <!-- Mark as Missed Button -->
        <button wire:click="markAsMissed" 
                class="btn-secondary text-sm text-warning-700 hover:text-warning-800 flex items-center"
                aria-label="Mark medication as missed">
          <svg class="w-4 h-4 mr-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          Mark Missed
        </button>
      @endif
    </div>
  </div>
  
  <!-- Cost Transparency Note -->
  @if($potentialSavings > 0)
    <div class="mt-md p-sm bg-primary-50 border border-primary-200 rounded-lg" role="alert">
      <div class="flex items-start">
        <svg class="w-5 h-5 text-primary-600 mr-sm mt-xs flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="text-sm text-primary-800">
          <p class="font-medium">Potential savings found!</p>
          <p>You could save ${{ number_format($potentialSavings, 2) }}/month by switching pharmacies. 
             <button wire:click="comparePrices" class="underline hover:no-underline">Compare now</button>
          </p>
        </div>
      </div>
    </div>
  @endif
  
  <!-- Flash Messages -->
  @if(session()->has('medication-taken'))
    <div class="mt-md p-sm bg-success-50 border border-success-200 rounded-lg text-success-800 text-sm" role="alert">
      {{ session('medication-taken') }}
    </div>
  @endif
  
  @if(session()->has('medication-missed'))
    <div class="mt-md p-sm bg-warning-50 border border-warning-200 rounded-lg text-warning-800 text-sm" role="alert">
      {{ session('medication-missed') }}
    </div>
  @endif
  
  @if(session()->has('reminder-set'))
    <div class="mt-md p-sm bg-primary-50 border border-primary-200 rounded-lg text-primary-800 text-sm" role="alert">
      {{ session('reminder-set') }}
    </div>
  @endif
</article>
