import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class HistorialService {
  private apiUrl: string = environment.apiUrl;

  constructor(
    private http: HttpClient
  ) { }

  getHistorial() {
    return this.http.get<any>(`${this.apiUrl}/historial`);
  }

  storeHistorial(data: any) {
    return this.http.post<any>(`${this.apiUrl}/historial`, data);
  }
  
}
