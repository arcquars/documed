<div class="row">
    <div class="col-md-6 form-group">
        <label for="legal_representative_dni">REPRESENTATE LEGAL</label>
        <input type="text" name="legal_representative_dni" id="legal_representative_dni" class="form-control form-control-sm @error('legal_representative_dni') is-invalid @enderror"
               value="{{ old('legal_representative_dni', $company->legal_representative_dni ?? '') }}" >
        @error('legal_representative_dni')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 form-group">
        <label for="rn_owner">RC DEL TITULAR</label>
        <input type="text" name="rn_owner" id="rn_owner" class="form-control form-control-sm @error('rn_owner') is-invalid @enderror"
               value="{{ old('rn_owner', $company->rn_owner ?? '') }}">
        @error('rn_owner')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

