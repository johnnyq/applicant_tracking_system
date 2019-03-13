<?php include("kiosk_header.php"); ?>

<?php 

if($session_agree_terms == 0){
  mysqli_query($mysqli,"UPDATE candidates SET current_status = 'Applying - Agreement' WHERE candidate_id = $session_candidate_id");
}

?>

<div class="jumbotron">
  <center>
    <h1>Employment Agreement</h1>
    <h3 class="text-danger">Please Read, Sign and Agree</h3>
    <h5>At-Will Employment</h5>
    <p>I, the undersigned employee, in consideration of my hiring by KBS as an at-will staffed employee of KBS, acknowledge and
    agree to the following: I have been hired as an at-will employee of KBS which is an employee staffing company and there is no
    contract of employment which exists between me and the client to which I have been assigned, nor between KBS and me. I
    understand and agree that either KBS or I can terminate our employment relationship at any time, as I am an at-will employee. I
    also agree that I may be assigned to an affiliated KBS company and employed by such company at any time at the sole and
    complete discretion of KBS and without my consent or agreement. I also agree that while I am a staffed employee of KBS, if KBS
    does not receive payment from client for services which I perform as a staffed employee, KBS will still pay me the applicable
    minimum wage (or the legally required minimum salary or overtime pay) for any such pay period, and I agree to this method of
    compensation. I understand that the client to which I am assigned at all times remains obligated to pay me my regular hourly rate
    of pay if I am a non-exempt employee and to pay me my full salary if I am an exempt employee even if KBS is not paid by the
    client to which I am assigned. I have been informed and I agree that if my assignment with any KBS client to which I am
    assigned ends for any reason, I must report back to KBS within seventy-two (72) hours for possible reassignment and that
    unemployment benefits may be denied me if I fail to do so. In recognition of the fact that any work injuries which might be
    sustained by me are covered by state workers' compensation statutes, and to avoid the circumvention of such statutes which
    might result from suits against the customers or clients of KBS or against KBS based on the same injury or injuries, and to the
    extent permitted by law, I hereby waive and forever release any rights I might have to make claims or bring suit against any client
    or customer of KBS or against KBS for damages based upon injuries which are covered under such workers' compensation
    statutes.</p>
    <h5>Client Company Paid Leave Policies and Other Benefits</h5>
    <p>In the case that Client Company maintains policies providing paid leave benefits such as vacation, sick leave, PTO, or
    severance pay, Client Company is solely responsible for paying any accrued benefits under such policies during employment
    and at the time of termination. KBS does not provide, and has no policy providing, vacation or other paid leave benefits. To the
    extent paid leave benefits are paid through KBS’s payroll to Employee, it is solely as a payroll service on behalf of Client
    Company. Similarly, to the extent Client Company provides other benefits pursuant to policies to which KBS is not a party, such
    as stock options, bonuses, profit sharing, retirement benefits, and so forth, Client Company is solely responsible for providing
    the benefits prescribed by those policies.</p>
    <h5>Paid Sick Leave</h5>
    <p>Unless exempt, the employee identified on this notice is entitled to minimum requirements for paid sick leave under state law
    which provides that an employee:
    a. May accrue paid sick leave and may request and use up to 3 days or 24 hours of accrued paid sick leave per year;
    b. May not be terminated or retaliated against for using or requesting the use of accrued paid sick leave; and
    c. Has the right to file a complaint against an employer who retaliates or discriminates against an employee for
    1. Requesting or using accrued sick days;
    2. Attempting to exercise the right to use accrued paid sick days;
    3. Filing a complaint or alleging a violation of Article 1.5 section 245 et seq. of the California Labor Code;
    4. Cooperating in an investigation or prosecution of an alleged violation of this Article or opposing any policy or practice or
    act that is prohibited by Article 1.5 section 245 et seq. of the California Labor Code.</p>

    <h5>Assignment</h5>
    <p>If Client Company files any form of bankruptcy, Employee will and hereby transfers to KBS all of his/her rights as a employee for
    the purposes of payment of wages and applicable payroll taxes. For this right, KBS will compensate Employee an additional five
    percent (5%) premium, on those amounts KBS receives from client as a result of the assignment of Employee’s rights.</p>

    <h5>Policies and Benefits</h5>
    <p>Employee agrees to abide by the policies of KBS, including but not limited to policies contained in any applicable Employee
    Handbook. Employee understands that eligibility and coverage for KBS benefits is controlled by the terms and conditions of the
    applicable Plan Documents.</p>

    <h5>Medical Authorization</h5>
    <p>I hereby authorize the release of any and all medical, hospital, vocational and psychological records and other information
    related to my injury, illness or worker’s compensation claim (hereinafter collectively referred to as “Medical Information”) to KBS
    Staffing, its employees, agents and authorized representatives. I hereby permit KBS to review and obtain copies of any and all
    Medical Information and to discuss pertinent Medical Information with professionals involved in my health care treatment. I
    hereby give KBS permission to release the Medical Information to healthcare providers, third party administrators, federal or
    state court, Workers’ Compensation Boards, employers, insurers and any other party who may be involved with my claim,
    treatment or vocational rehabilitation, or as required by law. Further, pursuant to Title 42 Section 1395y, carriers are required to
    share claimants’ Medical Information to enable the Centers for Medicare & Medicaid Services, formerly known as Healthcare
    Financing Administration (CMS) to determine eligibility for benefits. I hereby give KBS Staffing Workforce permission to discuss,
    disclose and release any Medical Information with or to CMS in connection with my claim. I hereby release KBS Staffing from
    any liability or loss due to the release of any Medical Information. I understand that all information released will be handled
    confidentially and in accordance with all applicable laws. I also understand that this authorization shall stay in effect until the
    closure of the claim file. I certify that this authorization has been made voluntarily and that the information given herein is
    accurate to the best of my knowledge. A photocopy of this authorization shall have the same validity as the original.</p>

    <h5>Accident/Injury Guidelines & Procedures</h5>
    <p>1. All injuries must first be reported to your immediate supervisor, who will, then report the incident to KBS Workers’
    Compensation Department before authorization will be given for medical treatment. Exception: emergency situations or if the
    injury occurs after hours and/or on the weekends.
    2. A drug screen is required within 24 hours for all injuries. In accordance with state law, a positive result relieves KBS and its
    insurers from any responsibility for any medical expenses incurred in connection with your injury. Refusal to submit to a drug test
    will result in the same consequences as a positive drug test result. If an employee tests positive on a post-accident drug test,
    they will be discharged for violation of the company substance abuse policy, and workers’ compensation benefits and/or
    medical bills incurred by the employee will be denied.
    3. The employee is required to inform the doctor or medical facility that light duty work is available. The employee will be required
    to work light duty per the doctor’s instructions.
    4. Employees are required to forward all medical information associated with the work-place injury/illness (doctor’s work status
    report, medical records, etc.) within 24 hours of receipt.
    5. Employees are required to complete an Employee Accident/Injury Report within 24 hours of the injury/illness.</p>
    
    <h5>Substance Abuse Policy</h5>
    <p>Any employee on duty or on company property who possesses, sells, receives, or is determined to have measurable levels of
    any illegal drug, or sufficient alcohol to impair performance in their blood or urine, will be subject to immediate discharge, and in
    appropriate situations, referred to law enforcement authorities. See your Employee Handbook regarding procedures applicable
    to prescriptive medications. Periodically, unannounced inspections will be made of persons entering or leaving company work-
    sites by authorized company representatives. Entry onto company property is deemed to be consent to an inspection of a
    person, locker, vehicle, or any other personal effects. KBS also reserves the right to require employee testing for illegal or
    controlled drugs or alcohol, based on reasonable suspicion and I as an employee specifically agree to post- accident drug
    testing in any situation where it is allowed by law.</p>

    <h5>Deductions</h5>
    <p>By initialing this page below and signing this employment agreement form I authorize deductions when applicable to be made
    out of my paycheck for tools, uniforms, health insurance, errors in payroll, garnishments, overpayments, bank fees for stop
    payment of a lost or damaged check, and any other work-related deductions. I agree that if I should leave or be discharged from
    employment at (the above client company of KBS) before the full amount is paid, any earnings over minimum wage will be
    applied to my deduction loan. The amount deducted from my last paycheck may be greater than the amount shown for each
    paycheck in accordance with the applicable labor law.</p>

    <h5>Six Hour Meal Period Waiver Agreement</h5>
    <p>I, hereby agree, by mutual consent of the employer and employee, to waive my required meal period when a work period of not
    more than six (6) hours will complete the day’s work, as defined by the State of California Industrial Welfare Commission Order,
    Section 11(A).</p>
    
    <h5>Acknowledgement of Meal & Rest Periods Policy</h5>
    <p>This policy details the meal and rest period policy and process for non-exempt employees in California.
    Pursuant to California law, employees who work more than five (5) hours will be provided with at least a full thirty (30) minute
    meal period. This meal period will begin no later than the fifth hour of work. Additionally, employees who work more than ten (10)
    hours in a workday will provided with a second thirty (30) minute meal period. This second meal period must be taken before the
    end of the tenth hour of work. Meal periods cannot be taken at the beginning or end of shifts. Employees will be relieved of all of
    their duties during meal periods and may not work during this time. An employee’s meal period shall not be considered “on duty”
    and will not be counted as time worked.
    Employees will be provided ten (10) minute paid rest periods to employees for every four (4) hours worked or major fraction
    thereof, unless the employee works less than three and a half hours in a day. Employees will be informed by a supervisor when
    to take their rest periods. Whenever practicable, employees should be able to take their rest breaks near the middle of each four-
    hour work period. Employees may not accumulate rest periods or use rest periods as a basis for starting work late, leaving their
    assigned shift early, or extending a meal period. Because rest breaks are paid, employees should not clock out for them.
    This meal and rest break policy applies at all times during your employment, including while placed on job assignment at any
    client company in California.
    I hereby certify that I fully understand this policy and process regarding meal and rest periods and will comply with
    these rules. If I miss or am unable to take a meal or rest period, I agree to notify my local branch office within twenty-
    four (24) hours so that my employer can investigate and take the appropriate corrective action.</p>

    <h5>Harassment, Discrimination and Retaliation Prevention Policy</h5>
    <h6>Reporting Harassment or Discrimination</h6>
    <p>If you believe that you have been subjected to or witnessed any unlawful harassment, discrimination, or retaliation, you should
    immediately report such conduct to your supervisor. If you do not feel comfortable reporting harassment or discrimination to your
    supervisor, you should report the harassment and/or discrimination to KBS Human Resources Employee. In addition, if an
    employee observes harassment or discrimination by another employee, supervisor, manager, or nonemployee, the employee
    should immediately report the incident to the Human Resources Department.
    Employees’ notification to KBS is essential to enforcing this policy. Employees may be assured that they will not be penalized in
    any way for reporting a harassment or discrimination problem. It is unlawful for employers to retaliate against employees who
    oppose practices prohibited by the California Fair Employment and Housing Act (“FEHA”), or who file complaints or otherwise
    participate in an investigation, proceeding, or hearing conducted by the California Department of Fair Employment and Housing
    (“DFEH”) or the Fair Employment and Housing Commission (“FEHC”). Similarly, KBS prohibits employees form hindering its
    internal investigations or its internal complaint procedure.
    All complaints of unlawful harassment or discrimination that are reported to management or to the Human Resources
    Department will be investigated as promptly as possible through a fair and thorough investigation by an impartial qualified KBS
    representative. KBS will conduct its investigation in a manner that provides all parties appropriate due process and reasonable
    conclusions that are based on the evidence collected, including by documenting and tracking its investigation. Corrective action
    will be taken where warranted and based on the documented evidence.
    All complaints of unlawful harassment or discrimination will be treated with as much confidentiality as possible, consistent with
    the need to conduct an adequate investigation.
    Supervisors and/or managers who witness harassment, discrimination, or retaliation, or who receive reports of harassment,
    discrimination, or retaliation, must immediately report such conduct to the Human Resources Department. Failure to do so for
    supervisors and/or managers may result in disciplinary action.</p>

    <h6>Violations of this Policy</h6>
    <p>Violation of this policy will subject an individual to disciplinary action, up to and including immediate termination. Additionally,
    under California law, employees may be held to be personally liable for harassing conduct that violates the FEHA.
    Retaliation Prohibited
    KBS prohibits retaliation against those who report, oppose or participate in an investigation of alleged violations of this policy.
    Participating in an investigation of alleged wrongdoing in the workplace includes:
    1. Filing a complaint with a federal or state enforcement or administrative agency.
    2. Participating in or cooperating with a federal or state enforcement agency that is conducting an investigation of the company
    regarding alleged unlawful activity.
    3. Testifying as a party, witness or accused regarding alleged unlawful activity.
    4. Associating with another employee who is engaged in any of these activities.
    5. Making or filing an internal complaint with the company regarding alleged unlawful activity.
    6. Providing informal notice to the company regarding alleged unlawful activity.KBS strictly prohibits any adverse action or
    retaliation against an employee for participating in an investigation of alleged violation of this policy. If an employee feels that he
    or she is being retaliated against, the employee should immediately KBS Human Resources Employee. In addition, if an
    employee observes retaliation by another employee, supervisor, manager or nonemployee, he or she should immediately report
    the incident to the individuals above.</p>

    <p class="text-danger">This Employment Agreement form is in compliance with labor code LC2810.5
    BY SIGNING BELOW, I ACKNOWLEDGE THE RECEIPT OF MY EMPLOYER INFORMATION, MY WAGE INFORMATION, A COPY OF
    THIS EMPLOYMENT AGREEMENT, RECEIPT OF THE HARASSMENT, DISCRIMINATION AND RETALIATION PREVENTION POLICY,
    AND MY EMPLOYER'S WORKERS COMPENSATION INFORMATION. BY SIGNING BELOW, I ALSO ACCEPT THE TERMS OF THIS
    EMPLOYMENT AGREEMENT FORM, ACKNOWLEDGE THAT I UNDERSTAND AND AGREE TO COMPLY WITH THE HARASSMENT,
    DISCRIMINATION, AND RETALIATION PREVENTION POLICY, AND CONFIRM THAT ALL MY PERSONAL AND EMPLOYMENT
    INFORMATION IS ACCURATE AND CORRECT:</p>

    <hr class="mb-5">
    <h4><i class="fa fa-pencil"></i> Click in the Box below to Sign</h4> 
      <img id="fw4_employee_signature" src="../img/spacer.png" class="border border-dark" height="200" width="750" data-toggle="modal" data-target="#signModal">
      <hr class="mb-5">

    <form action="post_kiosk.php" method="post">
      <input type="hidden" id="signature_image_base64" name="signature_image_base64" value="">
      <button type="submit" name="verify_candidate" class="btn btn-lg btn-primary"><i class="fa fa-thumbs-up"></i> I Agree</button>
      <!-- <button type="submit" name="cancel_candidate" class="btn btn-lg btn-outline-secondary"><i class="fa fa-thumbs-down"></i> I Disagree</button> -->
    </form>
  </center>
</div>

<!-- Modal -->
<div class="modal fade" id="signModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-pencil"></i> Sign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div> 
        <div class="modal-body">
          <div class="wrapper">
            <canvas id="signature-pad" class="signature-pad" width=750 height=200></canvas>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="save-png">Save</button>
          <button class="btn btn-danger" id="clear">Clear</button>
        </div>
    </div>
  </div>
</div>

<?php include("kiosk_footer.php"); ?>