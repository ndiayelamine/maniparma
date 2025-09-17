import { Component, OnInit  } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { CookieService } from 'ngx-cookie-service';
import { SendMailService } from 'src/app/Services/sendMail/send-mail.service';

@Component({
  selector: 'app-contattaci',
  templateUrl: './contattaci.component.html',
  styleUrls: ['./contattaci.component.css']
})
export class ContattaciComponent implements OnInit {
  messageForm: FormGroup;
  submitted = false;
  msgSent = false;
  msgError = false;

  constructor(private formBuilder: FormBuilder, private cookieService: CookieService, private sendMailService: SendMailService) {
  }

  ngOnInit() {
    this.cookieService.set('sameSite', 'Strict');
    this.cookieService.set('secure', 'true');
    this.messageForm = this.formBuilder.group({
      name: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      phone: ['', Validators.required],
      message: ['', Validators.required],
      // password: ['', [Validators.required, Validators.minLength(6)]],
      // confirmPassword: ['', Validators.required],
      // acceptTerms: [false, Validators.requiredTrue]
    }, {
        // validator: MustMatch('password', 'confirmPassword')
    });
  }

  // convenience getter for easy access to form fields
  get f() { return this.messageForm.controls; }

  onSubmit() {
    this.submitted = true;
    // stop here if form is invalid
    if (this.messageForm.invalid) {
        return;
    }

    this.sendMailService.sendMail(this.messageForm.value).subscribe((res: any) => {
      // console.log(res);
      if(res.success){
        this.msgSent = true;
        this.msgError = false;
        this.onReset();
      }else{
        this.msgSent = false;
        this.msgError = true;
        console.log(res);
      }
    }, error => {
      this.msgError = true;
      console.log('AppComponent Error', error);
    });
    // display form values on success
    // console.log('SUCCESS!! :-)\n\n' + JSON.stringify(this.messageForm.value, null, 4));
  }

  onReset() {
    this.messageForm.reset();
    this.submitted = false;
    // this.msgSent = false;
   // this.msgError = false;
  }

}
